import mysql.connector
import pandas as pd
import matplotlib.pyplot as plt
from io import BytesIO

# Replace with your actual database connection information
host_name = 'localhost'
db_name = 'grade sheet'
db_user = 'root'
db_password = ''

# Set up the database connection
database_connection = mysql.connector.connect(
    host=host_name,
    database=db_name,
    user=db_user,
    password=db_password
)

# SQL query
query = """
SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id FROM (
    SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, NULL as cloned_id FROM gradesheet WHERE class = 'actual' AND over_all_grade IS NOT NULL
    UNION
    SELECT date, over_all_grade, over_all_grade_per, class_id, instructor, gradsheet_status, cloned_id FROM cloned_gradesheet WHERE class = 'actual' AND over_all_grade IS NOT NULL
) AS combined_data
ORDER BY date DESC;
"""

# Execute the SQL query
cursor = database_connection.cursor()
cursor.execute(query)
result = cursor.fetchall()

# Define the column names
columns = ['date', 'over_all_grade', 'over_all_grade_per', 'class_id', 'instructor', 'gradsheet_status', 'cloned_id']

# Create a DataFrame from the results
df = pd.DataFrame(result, columns=columns)

# Close the cursor and the database connection
cursor.close()
database_connection.close()

# Convert 'date' to datetime and 'over_all_grade_per' to numeric
df['date'] = pd.to_datetime(df['date'])

# Convert 'over_all_grade_per' to numeric, coercing errors to NaN
df['over_all_grade_per'] = pd.to_numeric(df['over_all_grade_per'], errors='coerce')

# Write the DataFrame to an Excel file using the xlsxwriter engine
excel_file = 'grades_report.xlsx'
writer = pd.ExcelWriter(excel_file, engine='xlsxwriter')
df.to_excel(writer, index=False, sheet_name='Report')

# Start from this point in your code
image_start_row = 2

# Each image will occupy 'image_height' rows. Adjust this based on your image height.
image_height = 15

# Now, we will create and insert images for each grade.
for grade in df['over_all_grade'].unique():
    grade_df = df[df['over_all_grade'] == grade]
    
    # Create a chart with matplotlib for each grade
    plt.figure(figsize=(10, 6))
    plt.bar(grade_df['date'].values, grade_df['over_all_grade_per'].values, color='skyblue')
    plt.title(f'Overall Grade Percentage for Grade {grade}')
    plt.xlabel('Date')
    plt.ylabel('Overall Grade Percentage')

    # Save each plot to a BytesIO object to avoid saving it to disk
    plot_bytes = BytesIO()
    plt.savefig(plot_bytes, format='png')
    plot_bytes.seek(0)  # Rewind the BytesIO object to the beginning

    # Access the XlsxWriter objects from the dataframe
    workbook = writer.book
    worksheet = writer.sheets['Report']

    # Insert image at the correct position
    image_position = f'G{image_start_row}'
    worksheet.insert_image(image_position, f'grade_{grade}_plot.png', {
        'image_data': plot_bytes,
        'x_scale': 0.5,  # Scale the image if it's too big
        'y_scale': 0.5   # Scale the image if it's too big
    })

    # Increment the row position for the next image
    image_start_row += image_height

    # Clear the current figure for the next plot
    plt.clf()

# Close the Pandas Excel writer and output the Excel file
writer.save()

