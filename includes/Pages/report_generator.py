import sys
import pandas as pd
from sqlalchemy import create_engine
import logging
import matplotlib.pyplot as plt
from openpyxl import Workbook
from tkinter import Tk, Button

# Configure logging
logging.basicConfig(filename='script.log', level=logging.DEBUG, format='%(asctime)s - %(levelname)s - %(message)s')

# Retrieve command line arguments
course_id = sys.argv[1]
user_id = sys.argv[2]
# Database connection details
db_username = 'root'
db_password = ''
db_host = 'localhost'
db_name = 'grade sheet'

# SQLAlchemy connection string
connection_string = f'mysql+mysqlconnector://{db_username}:{db_password}@{db_host}/{db_name}'

# First SQL query (for 'actual' class)
first_query = """
SELECT
    combined_data.date,
    over_all_grade,
    over_all_grade_per,
    combined_data.class_id,
    combined_data.instructor AS instructor_id,
    gradsheet_status,
    cloned_id,
    student.nickname AS student_nickname,
    actual.symbol,
    actual.actual,
    phase.phasename,
    instructor.nickname AS instructor_nickname
FROM (
    SELECT
        date,
        over_all_grade,
        user_id,
        phase_id,
        over_all_grade_per,
        class_id,
        instructor,
        gradsheet_status,
        NULL AS cloned_id
    FROM gradesheet
    WHERE
        class = 'actual'
        AND course_id = %s
        AND user_id = %s
        AND over_all_grade IS NOT NULL
    UNION ALL
    SELECT
        date,
        over_all_grade,
        user_id,
        phase_id,
        over_all_grade_per,
        class_id,
        instructor,
        gradsheet_status,
        cloned_id
    FROM cloned_gradesheet
    WHERE
        class = 'actual'
        AND course_id = %s
        AND user_id = %s
        AND over_all_grade IS NOT NULL
) AS combined_data
JOIN users AS student ON combined_data.user_id = student.id
JOIN actual ON combined_data.class_id = actual.id
JOIN phase ON combined_data.phase_id = phase.id
JOIN users AS instructor ON combined_data.instructor = instructor.id
ORDER BY combined_data.date DESC;

"""

# Second SQL query (for 'sim' class)
second_query = """
SELECT
    combined_data.date,
    over_all_grade,
    over_all_grade_per,
    combined_data.class_id,
    combined_data.instructor AS instructor_id,
    gradsheet_status,
    cloned_id,
    instructor.nickname AS instructor_nickname,
    student.nickname AS student_nickname, -- Include student.nickname here
    sim.shortsim,
    sim.sim,
    phase.phasename
FROM (
    SELECT
        date,
        over_all_grade,
        user_id,
        phase_id,
        over_all_grade_per,
        class_id,
        instructor,
        gradsheet_status,
        NULL AS cloned_id
    FROM gradesheet
    WHERE
        class = 'sim'
        AND course_id = %s
        AND user_id = %s
        AND over_all_grade IS NOT NULL
    UNION ALL
    SELECT
        date,
        over_all_grade,
        user_id,
        phase_id,
        over_all_grade_per,
        class_id,
        instructor,
        gradsheet_status,
        cloned_id
    FROM cloned_gradesheet
    WHERE
        class = 'sim'
        AND course_id = %s
        AND user_id = %s
        AND over_all_grade IS NOT NULL
) AS combined_data
JOIN users AS instructor ON combined_data.instructor = instructor.id
JOIN users AS student ON combined_data.user_id = student.id -- Alias 'student' for accessing student.nickname
JOIN sim ON combined_data.class_id = sim.id
JOIN phase ON combined_data.phase_id = phase.id
ORDER BY combined_data.date DESC;

"""

third_query = """
SELECT
    test_data.id,
    test_data.test_id,
    test_data.student_id,
    test_data.course_id,
    test_data.marks,
    test_data.created,
    test_data.status,
    student.nickname AS student_nickname,
    instructor.nickname AS instructor_nickname,
    -- Include instructor.nickname
    test.shorttest
FROM
    test_data
JOIN
    users AS student ON test_data.student_id = student.id
JOIN
    test ON test_data.test_id = test.id
JOIN
    users AS instructor ON test_data.userId -- Use the correct column name here
WHERE
    test_data.course_id = %s
    AND test_data.student_id = %s
ORDER BY
    test_data.id DESC;

"""

fourth_query = """
SELECT qm.*, q.quiz, u.nickname 
FROM quiz_marks qm
JOIN quiz q ON qm.quiz_id = q.id
JOIN users u ON qm.userId = u.id
WHERE qm.course_id = %s AND qm.student_id = %s
ORDER BY qm.id DESC;

"""



fifth_query = """
SELECT memo.*, memocate.category, users.name 
FROM memo
JOIN memocate ON memo.categoryId = memocate.id
JOIN users ON memo.student_id = users.id
WHERE memo.course_id = %s
AND memo.student_id = %s
AND memo.categoryId != 'absent' 
ORDER BY memo.id DESC 

"""

sixth_query = """
SELECT 
    d.*, 
    dc.category,
    u.name AS instructor_name
FROM 
    discipline d
LEFT JOIN 
    desccate dc ON d.categoryId = dc.id
LEFT JOIN 
    users u ON d.inst_id = u.id
WHERE 
    d.course_id = %s
    AND d.student_id = %s 
    AND d.categoryId != 'absent'
ORDER BY 
    d.id DESC 
LIMIT 3;
"""


def generate_graph(dataframe, x_column, y_column, graph_filename):
    # Ensure that each row has a unique index by resetting the DataFrame's index
    dataframe.reset_index(inplace=True)
    
    # Convert y_column to numeric and fill NaNs with 0
    dataframe[y_column] = pd.to_numeric(dataframe[y_column], errors='coerce').fillna(0)
    
    # Create the plot
    fig, ax = plt.subplots(figsize=(12, 8))

    # Generate the bars, using the new unique index for the x-axis
    bars = ax.bar(dataframe.index, dataframe[y_column], color='skyblue')
    
    # Set the x-axis label to be the index
    ax.set_xlabel('Index')
    ax.set_ylabel(y_column)
    ax.set_title(f'{y_column} vs {x_column}')

    # Use the symbol from the original DataFrame for tick labels
    ax.set_xticks(dataframe.index)
    ax.set_xticklabels(dataframe[x_column], rotation=45)

    # Add the y-values above the bars
    for bar, label in zip(bars, dataframe[x_column]):
        yval = bar.get_height()
        ax.text(bar.get_x() + bar.get_width()/2, yval, f'{int(yval)}\n{label}', ha='center', va='bottom')

    plt.tight_layout()
    plt.savefig(graph_filename)
    plt.close()





try:
    # Create an SQLAlchemy engine
    engine = create_engine(connection_string)

    # Execute the queries and fetch results into DataFrames df1, df2, df3, df4, df5, df6
    df1 = pd.read_sql_query(first_query, engine, params=(course_id, user_id, course_id, user_id))
    df2 = pd.read_sql_query(second_query, engine, params=(course_id, user_id, course_id, user_id))
    df3 = pd.read_sql_query(third_query, engine, params=(course_id, user_id))
    df4 = pd.read_sql_query(fourth_query, engine, params=(course_id, user_id))
    df5 = pd.read_sql_query(fifth_query, engine, params=(course_id, user_id))
    df6 = pd.read_sql_query(sixth_query, engine, params=(course_id, user_id))

    # Column renaming and selection logic for each DataFrame
    columns_to_select_and_rename_df1 = {
        'over_all_grade': 'over_all_grade',
        'over_all_grade_per': 'over_all_grade_per',
        'student_nickname': 'studentname',
        'symbol': 'symbol',
        'actual': 'class',
        'phasename': 'phasename',
        'instructor_nickname': 'instructorname',
    }

    columns_to_select_and_rename_df2 = {
        'over_all_grade': 'over_all_grade',
        'over_all_grade_per': 'over_all_grade_per',
        'instructor_nickname': 'instructorname',
        'student_nickname': 'studentname',
        'shortsim': 'symbol',
        'sim': 'class',
        'phasename': 'phasename',
        
    }


    columns_to_select_and_rename_df3 = {
        
        'marks': 'marks',
        'student_nickname': 'studentname',
        'instructor_nickname': 'instructorname',
        'shorttest': 'symbol',
    }

    columns_to_select_and_rename_df4 = {
        
        'marks': 'marks',
        'quiz': 'symbol',
        
    }

    columns_to_select_and_rename_df5 = {
        
        'memomarks': 'marks',
        'category': 'symbol',
        
    }

    columns_to_select_and_rename_df6 = {
        
        'dismarks': 'marks',
        'category': 'symbol',
        
    }

    df1 = df1[list(columns_to_select_and_rename_df1.keys())]
    df1.rename(columns=columns_to_select_and_rename_df1, inplace=True)

    df2 = df2[list(columns_to_select_and_rename_df2.keys())]
    df2.rename(columns=columns_to_select_and_rename_df2, inplace=True)

    df3 = df3[list(columns_to_select_and_rename_df3.keys())]
    df3.rename(columns=columns_to_select_and_rename_df3, inplace=True)
    # df3.drop_duplicates(subset=['studentname', 'instructorname'], keep='first', inplace=True)
    # Sort df3 by the 'marks' column in descending order
    df3 = df3.sort_values(by='marks', ascending=False)

# Remove duplicate rows based on 'student_nickname' and 'instructor_nickname' columns
# and retain the first occurrence (highest 'marks')
    df3 = df3[~df3.duplicated(subset=['studentname', 'instructorname'], keep='first')]

# Reset the index after removing duplicates
    df3.reset_index(drop=True, inplace=True)


# Reset the index after removing duplicates
    df3.reset_index(drop=True, inplace=True)

    df4 = df4[list(columns_to_select_and_rename_df4.keys())]
    df4.rename(columns=columns_to_select_and_rename_df4, inplace=True)

    df5 = df5[list(columns_to_select_and_rename_df5.keys())]
    df5.rename(columns=columns_to_select_and_rename_df5, inplace=True)

    df6 = df6[list(columns_to_select_and_rename_df6.keys())]
    df6.rename(columns=columns_to_select_and_rename_df6, inplace=True)

    # Create a Pandas Excel writer using XlsxWriter as the engine
    excel_filename = r"C:\Users\hp\Downloads\report.xlsx"
    with pd.ExcelWriter(excel_filename, engine='xlsxwriter') as writer:
        # Define the header and title formats
        header_format = writer.book.add_format({
            'bold': True,
            'align': 'center',
            'valign': 'vcenter',
            'fg_color': '#D7E4BC',
            'border': 1
        })
        title_format = writer.book.add_format({
            'bold': True,
            'align': 'center',
            'font_size': 14
        })

        # Write each DataFrame to a separate sheet with a title
        df_names = ['Actual', 'Sim', 'Test', 'Quiz', 'Memo', 'Discipline']
        dfs = [df1, df2, df3, df4, df5, df6]

        for df, name in zip(dfs, df_names):
            # Add title
            title = f"Data for {name}"  # You can customize this title
            df.to_excel(writer, sheet_name=name, startrow=2, header=False, index=False)
            worksheet = writer.sheets[name]
            worksheet.write('A1', title, title_format)

            # Write headers with formatting
            for col_num, value in enumerate(df.columns.values):
                worksheet.write(1, col_num, value, header_format)
            
            # Set the column width
            worksheet.set_column('A:Z', 20)

    
            print(df1[df1['symbol'] == 'ADR-2'])
            df1['over_all_grade_per'] = df1['over_all_grade_per'].astype(float)

        # Generate and insert the graph for df1
        graph_filename = "df1_bar_chart.png"
        df1['symbol'] = df1['symbol'].str.replace('[^a-zA-Z0-9]', '', regex=True)
        print(df1['symbol'].unique())

 # Add this line
        generate_graph(df1, 'symbol', 'over_all_grade_per', graph_filename)
        worksheet_df1 = writer.sheets['Actual']
        worksheet_df1.insert_image('I1', graph_filename)  # Adjust the cell as needed



        # Generate and insert the graph for df3
        graph_filename_df3 = "df3_bar_chart.png"
        generate_graph(df3, 'symbol', 'marks', graph_filename_df3)
        worksheet_df3 = writer.sheets['Test']  # Adjust the sheet name if different
        worksheet_df3.insert_image('I1', graph_filename_df3)  # Adjust the cell as needed


        # Generate and insert the graph for df4
        graph_filename_df4 = "df4_bar_chart.png"
        generate_graph(df4, 'symbol', 'marks', graph_filename_df4)
        worksheet_df4 = writer.sheets['Quiz']  # Adjust the sheet name if different
        worksheet_df4.insert_image('I1', graph_filename_df4)  # Adjust the cell as needed

        graph_filename_df5 = "df5_bar_chart.png"
        generate_graph(df5, 'symbol', 'marks', graph_filename_df5)
        worksheet_df5 = writer.sheets['Memo']  # Adjust the sheet name if different
        worksheet_df5.insert_image('I1', graph_filename_df5) 


        graph_filename_df6 = "df6_bar_chart.png"
        generate_graph(df6, 'symbol', 'marks', graph_filename_df6)
        worksheet_df6 = writer.sheets['Discipline']  # Adjust the sheet name if different
        worksheet_df6.insert_image('I1', graph_filename_df6)


except Exception as e:
    # Handle exceptions
    error_message = str(e)
    print(f"Error: {error_message}")
    logging.error(f"Error: {error_message}")
