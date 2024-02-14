import pandas as pd
import sys
import xlsxwriter
from sqlalchemy import create_engine
import matplotlib.pyplot as plt
from io import BytesIO


log_file = open('log.txt', 'w')
sys.stdout = log_file
sys.stderr = log_file

def generate_excel_reports_with_graph(db_config):
   
    engine = create_engine(f"mysql+mysqlconnector://{db_config['user']}:{db_config['password']}@{db_config['host']}/{db_config['database']}")

    course_query = "SELECT DISTINCT CourseName, CourseCode FROM newcourse"
    courses_df = pd.read_sql(course_query, engine)
    course_combinations = courses_df.to_dict('records')

    columns_to_select_and_rename_df1 = {
        'over_all_grade': 'over_all_grade',
        'avg_grade_per': 'over_all_grade_per',
        'instructor_nickname': 'instructorname',
        'student_nickname': 'studentname',
        'phasename': 'phasename',
        'symbol': 'symbol'
    }

    columns_to_select_and_rename_df2 = {
        'over_all_grade': 'over_all_grade',
        'avg_grade_per': 'over_all_grade_per',
        'instructor_nickname': 'instructorname',
        'student_nickname': 'studentname',
        'phasename': 'phasename',
        'shortsim': 'symbol'
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
        'name': 'studentname',
        
    }



    columns_to_select_and_rename_df6 = {
        
        'dismarks': 'marks',
        'category': 'symbol',
        
    }


   

    for course in course_combinations:
        std_course1 = course['CourseName']
        CourseCode11 = course['CourseCode']

        student_query = f"SELECT DISTINCT StudentNames FROM newcourse WHERE CourseName = '{std_course1}' AND CourseCode = '{CourseCode11}'"
        students_df = pd.read_sql(student_query, engine)
        student_ids = students_df['StudentNames'].tolist()

        for student_id in student_ids:
            filename = f"C:\\xampp\\htdocs\\latest\\TOS\\downloadable_reports\\{std_course1}_{student_id}_report.xlsx"

            workbook = xlsxwriter.Workbook(filename, {'nan_inf_to_errors': True})

            # Define header and title formats
            header_format = workbook.add_format({
                'bold': True,
                'text_wrap': True,
                'align': 'center',
                'valign': 'vcenter',
                'fg_color': '#D7E4BC',
                'border': 1
            })
            title_format = workbook.add_format({
                'bold': True,
                'align': 'center',
                'font_size': 14
            })


            cell_format = workbook.add_format({
            'align': 'left',    # Horizontal alignment
            'valign': 'vcenter' # Vertical alignment
            })
            cell_format.set_text_wrap()

            # First worksheet with first query
            worksheet1 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_actual"[:31])
            worksheet1.write('A1', 'Data for Actual', title_format)
            data_query1 = f"""
               SELECT
                    over_all_grade,
                    AVG(over_all_grade_per) AS avg_grade_per,
                    student.nickname AS student_nickname,
                    instructor.nickname AS instructor_nickname,
                    phase.phasename,
                    actual.symbol
                FROM (
                    SELECT
                        over_all_grade,
                        over_all_grade_per,
                        gradesheet.user_id,
                        gradesheet.instructor,
                        gradesheet.phase_id,
                        gradesheet.class_id
                    FROM gradesheet
                    WHERE
                        class = 'actual' AND
                        course_id = '{std_course1}' AND
                        user_id = '{student_id}' AND
                        over_all_grade_per IS NOT NULL
                    UNION ALL
                    SELECT
                        over_all_grade,
                        over_all_grade_per,
                        cloned_gradesheet.user_id,
                        cloned_gradesheet.instructor,
                        cloned_gradesheet.phase_id,
                        cloned_gradesheet.class_id
                    FROM cloned_gradesheet
                    WHERE
                        class = 'actual' AND
                        course_id = '{std_course1}' AND
                        user_id = '{student_id}' AND
                        over_all_grade_per IS NOT NULL
                ) AS combined_data
                JOIN users AS student ON combined_data.user_id = student.id
                JOIN users AS instructor ON combined_data.instructor = instructor.id
                JOIN phase ON combined_data.phase_id = phase.id
                JOIN actual ON combined_data.class_id = actual.id
                GROUP BY over_all_grade, student_nickname, instructor_nickname, phase.phasename, actual.symbol
                ORDER BY over_all_grade;
            """
            data_df1 = pd.read_sql(data_query1, engine)

            # Rename columns for first query
            data_df1 = data_df1[list(columns_to_select_and_rename_df1.keys())]
            data_df1.rename(columns=columns_to_select_and_rename_df1, inplace=True)

            for col_num, value in enumerate(data_df1.columns.values):
                worksheet1.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df1.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet1.write(row_num, col_num, value,cell_format)

          

            # Second worksheet with second query
            worksheet2 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_sim"[:31])
            worksheet2.write('A1', 'Data for Sim', title_format)
            data_query2 = f"""
                 SELECT
                    over_all_grade,
                    AVG(over_all_grade_per) AS avg_grade_per,
                    student.nickname AS student_nickname,
                    instructor.nickname AS instructor_nickname,
                    phase.phasename,
                    sim.shortsim
                FROM (
                    SELECT
                        over_all_grade,
                        over_all_grade_per,
                        gradesheet.user_id,
                        gradesheet.instructor,
                        gradesheet.phase_id,
                        gradesheet.class_id
                    FROM gradesheet
                    WHERE
                        class = 'sim' AND
                        course_id = '{std_course1}' AND
                        user_id = '{student_id}' AND
                        over_all_grade_per IS NOT NULL
                    UNION ALL
                    SELECT
                        over_all_grade,
                        over_all_grade_per,
                        cloned_gradesheet.user_id,
                        cloned_gradesheet.instructor,
                        cloned_gradesheet.phase_id,
                        cloned_gradesheet.class_id
                    FROM cloned_gradesheet
                    WHERE
                        class = 'sim' AND
                        course_id = '{std_course1}' AND
                        user_id = '{student_id}' AND
                        over_all_grade_per IS NOT NULL
                ) AS combined_data
                JOIN users AS student ON combined_data.user_id = student.id
                JOIN users AS instructor ON combined_data.instructor = instructor.id
                JOIN phase ON combined_data.phase_id = phase.id
                JOIN sim ON combined_data.class_id = sim.id
                GROUP BY over_all_grade, student_nickname, instructor_nickname, phase.phasename, sim.shortsim
                ORDER BY over_all_grade;
            """
            data_df2 = pd.read_sql(data_query2, engine)

            # Rename columns for second query
            data_df2 = data_df2[list(columns_to_select_and_rename_df2.keys())]
            data_df2.rename(columns=columns_to_select_and_rename_df2, inplace=True)

            for col_num, value in enumerate(data_df2.columns.values):
                worksheet2.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df2.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet2.write(row_num, col_num, value,cell_format)

           


            worksheet3 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_test"[:31])
            worksheet3.write('A1', 'Data for Test', title_format)
            data_query3 = f"""
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
    test_data.course_id = '{std_course1}'
    AND test_data.student_id = '{student_id}'
ORDER BY
    test_data.id DESC;


            """
            data_df3 = pd.read_sql(data_query3, engine)

            # Rename columns for second query
            data_df3 = data_df3[list(columns_to_select_and_rename_df3.keys())]
            data_df3.rename(columns=columns_to_select_and_rename_df3, inplace=True)

            for col_num, value in enumerate(data_df3.columns.values):
                worksheet3.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df3.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet3.write(row_num, col_num, value,cell_format)
            
            

            
            worksheet4 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_quiz"[:31])
            worksheet4.write('A1', 'Data for quiz', title_format)
            data_query4 = f"""
SELECT qm.*, q.quiz, u.nickname 
FROM quiz_marks qm
JOIN quiz q ON qm.quiz_id = q.id
JOIN users u ON qm.userId = u.id
WHERE qm.course_id = '{std_course1}' AND qm.student_id = '{student_id}'
ORDER BY qm.id DESC;



            """
            data_df4 = pd.read_sql(data_query4, engine)

            # Rename columns for second query
            data_df4 = data_df4[list(columns_to_select_and_rename_df4.keys())]
            data_df4.rename(columns=columns_to_select_and_rename_df4, inplace=True)

            for col_num, value in enumerate(data_df4.columns.values):
                worksheet4.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df4.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet4.write(row_num, col_num, value,cell_format)
            
           
            
            worksheet5 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_memo"[:31])
            worksheet5.write('A1', 'Data for Memo', title_format)
            data_query5 = f"""
SELECT memo.*, memocate.category, users.name 
FROM memo
JOIN memocate ON memo.categoryId = memocate.id
JOIN users ON memo.student_id = users.id
WHERE memo.course_id = '{std_course1}'
AND memo.student_id = '{student_id}'
AND memo.categoryId != 'absent' 
ORDER BY memo.id DESC 




            """
            data_df5 = pd.read_sql(data_query5, engine)

            # Rename columns for second query
            data_df5 = data_df5[list(columns_to_select_and_rename_df5.keys())]
            data_df5.rename(columns=columns_to_select_and_rename_df5, inplace=True)

            for col_num, value in enumerate(data_df5.columns.values):
                worksheet5.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df5.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet5.write(row_num, col_num, value,cell_format)
            
          
            
            
            worksheet6 = workbook.add_worksheet(name=f"{std_course1}_{student_id}_discipline"[:31])
            worksheet6.write('A1', 'Data for Discipline', title_format)
            data_query6 = f"""
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
    d.course_id = '{std_course1}'
    AND d.student_id = '{student_id}'
    AND d.categoryId != 'absent'
ORDER BY 
    d.id DESC 
LIMIT 3;




            """
            data_df6 = pd.read_sql(data_query6, engine)

            # Rename columns for second query
            data_df6 = data_df6[list(columns_to_select_and_rename_df6.keys())]
            data_df6.rename(columns=columns_to_select_and_rename_df6, inplace=True)

            for col_num, value in enumerate(data_df6.columns.values):
                worksheet6.write(2, col_num, value, header_format)
            for row_num, row in enumerate(data_df6.itertuples(index=False), 3):
                for col_num, value in enumerate(row):
                    worksheet6.write(row_num, col_num, value,cell_format)
          
            
            
            









            # Close the workbook for the current student
            workbook.close()
      





# Database configuration (update with your actual configuration)
db_config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'grade sheet'
}

# Generate the reports with graphs
generate_excel_reports_with_graph(db_config)
log_file.close()

