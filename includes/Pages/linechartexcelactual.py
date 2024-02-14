import mysql.connector
import pandas as pd
import xlsxwriter

# Function to fetch data from database and return a DataFrame
def fetch_data_from_db():
    # Database connection parameters - replace with your details
    host_name = 'localhost'  # Corrected from 'localhos'
    db_name = 'grade sheet'
    db_user = 'root'
    db_password = ''

    # Database query - replace with your actual query
    query = """
    SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
    FROM (
        SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id
        FROM gradesheet WHERE class = 'actual' AND over_all_grade IS NOT NULL
        UNION
        SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id
        FROM cloned_gradesheet WHERE class = 'actual' AND over_all_grade IS NOT NULL
    ) AS combined_data
    ORDER BY date DESC
    """

    # Connect to the database and fetch the data
    database_connection = mysql.connector.connect(
        host=host_name,
        database=db_name,
        user=db_user,
        password=db_password
    )
    cursor = database_connection.cursor()
    cursor.execute(query)
    result = cursor.fetchall()
    cursor.close()
    database_connection.close()

    # Column names obtained from the query
    columns = ['date', 'over_all_grade', 'over_all_grade_per', 'class_id', 'instructor', 'gradsheet_status', 'cloned_id']

    # Create a DataFrame and return it
    df = pd.DataFrame(result, columns=columns)
    return df

# Function to create a chart from DataFrame and insert it into an Excel sheet
def insert_chart_into_excel(writer, df):
    # Use the xlsxwriter engine for the Pandas writer
    workbook = writer.book
    worksheet = writer.sheets['Report']

    # Create a line chart object
    chart = workbook.add_chart({'type': 'line'})

    # Configure the series of the chart from the DataFrame data
    max_row = len(df) + 1
    chart.add_series({
        'name':       '=Report!$C$1',
        'categories': '=Report!$A$2:$A$' + str(max_row),
        'values':     '=Report!$C$2:$C$' + str(max_row),
    })

    # Insert the chart into the worksheet
    worksheet.insert_chart('G2', chart)

# Main function to generate the Excel report
def excel_report():
    # Fetch the data from the database
    df = fetch_data_from_db()

    # Write the data to an Excel file
    excel_file = 'selected_phases_class_counts_and_colors.xlsx'
    writer = pd.ExcelWriter(excel_file, engine='xlsxwriter')
    df.to_excel(writer, index=False, sheet_name='Report')

    # Create a chart and insert it into the Excel file
    insert_chart_into_excel(writer, df)

    # Close the Pandas Excel writer and output the Excel file
    writer.save()

if __name__ == '__main__':
    excel_report()
