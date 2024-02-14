import pandas as pd
import mysql.connector
from mysql.connector import Error
import matplotlib.pyplot as plt
from openpyxl import Workbook
from openpyxl.chart import LineChart, Reference

# Replace with your database connection details
config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'grade sheet'
}

try:
    # Connect to the database
    connection = mysql.connector.connect(**config)

    # Check if the connection was successful
    if connection.is_connected():
        cursor = connection.cursor()

        # Query to fetch symbols and their counts from actual
        actual_query = "SELECT symbol, COUNT(*) as count FROM actual GROUP BY symbol"
        cursor.execute(actual_query)
        actual_data = cursor.fetchall()
        df_actual = pd.DataFrame(actual_data, columns=['symbol', 'actual_count'])

        # Query to fetch symbols and their counts from sim
        sim_query = "SELECT symbol, COUNT(*) as count FROM sim GROUP BY symbol"
        cursor.execute(sim_query)
        sim_data = cursor.fetchall()
        df_sim = pd.DataFrame(sim_data, columns=['symbol', 'sim_count'])

        # Merging the two dataframes on symbols
        df_merged = pd.merge(df_actual, df_sim, on='symbol', how='outer').fillna(0)

        # Normalize counts to 0-100 if needed
        df_merged['actual_count'] = (df_merged['actual_count'] / df_merged['actual_count'].max()) * 100
        df_merged['sim_count'] = (df_merged['sim_count'] / df_merged['sim_count'].max()) * 100

        # Export the DataFrame to an Excel file
        with pd.ExcelWriter('output.xlsx') as writer:
            df_merged.to_excel(writer, index=False, sheet_name='Data')

            # If you want to also include the chart in the Excel file, you will need to do more work with openpyxl
            workbook = writer.book
            worksheet = writer.sheets['Data']

            chart = LineChart()
            chart.title = "Counts by Symbol"
            chart.x_axis.title = "Symbol"
            chart.y_axis.title = "Count"

            # Add actual counts to line chart
            data = Reference(worksheet, min_col=2, min_row=1, max_col=2, max_row=len(df_merged) + 1)
            chart.add_data(data, titles_from_data=True)
            cats = Reference(worksheet, min_col=1, min_row=2, max_row=len(df_merged) + 1)
            chart.set_categories(cats)

            # Add sim counts to line chart
            data = Reference(worksheet, min_col=3, min_row=1, max_col=3, max_row=len(df_merged) + 1)
            chart.add_data(data, titles_from_data=True)

            # Place the chart on the worksheet
            worksheet.add_chart(chart, "E2")

        print("Data exported successfully to Excel with the chart.")

        # Now create the line chart with matplotlib
        plt.figure(figsize=(10, 5))
        plt.plot(df_merged['symbol'], df_merged['actual_count'], marker='o', label='Actual Count')
        plt.plot(df_merged['symbol'], df_merged['sim_count'], marker='o', label='Sim Count')
        plt.title('Counts by Symbol')
        plt.xlabel('Symbol')
        plt.ylabel('Count (Normalized to 0-100)')
        plt.xticks(rotation=90)
        plt.legend()
        plt.tight_layout()
        plt.savefig('line_chart.png')
        plt.show()

except Error as e:
    print(f"Error: {e}")

finally:
    if connection and connection.is_connected():
        connection.close()
        print("MySQL connection is closed")
