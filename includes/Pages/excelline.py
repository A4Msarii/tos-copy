import mysql.connector
import pandas as pd

# Setup the connection to the MySQL database
connect = mysql.connector.connect(
    host='localhost',
    database='grade sheet',
    user='root',
    password=''
)

# Define the phases of interest
phases_of_interest = ['driving', 'parking']

# DataFrame to hold all the information including color for driving and parking
selected_counts_colors = pd.DataFrame()

for phase_name in phases_of_interest:
    # Get the phase details including color
    phase_details_query = f"SELECT id, color FROM phase WHERE phasename = '{phase_name}'"
    phase_details = pd.read_sql(phase_details_query, connect)
    
    # If phase exists, proceed to count actual and sim classes
    if not phase_details.empty:
        phase_id = phase_details.iloc[0]['id']
        phase_color = phase_details.iloc[0]['color']
        
        # Count actual classes
        actual_count_query = f"SELECT COUNT(*) as actual_count FROM actual WHERE phase = {phase_id}"
        actual_count = pd.read_sql(actual_count_query, connect).iloc[0]['actual_count']
        
        # Count sim classes
        sim_count_query = f"SELECT COUNT(*) as sim_count FROM sim WHERE phase = {phase_id}"
        sim_count = pd.read_sql(sim_count_query, connect).iloc[0]['sim_count']
        
        # Append the counts and color to the DataFrame
        selected_counts_colors = selected_counts_colors.append({
            'Phase Name': phase_name,
            'Actual Count': actual_count,
            'Sim Count': sim_count,
            'Color': phase_color
        }, ignore_index=True)

# Close the connection
connect.close()

# Export the DataFrame to Excel
excel_file = 'selected_phases_class_counts_and_colors.xlsx'
with pd.ExcelWriter(excel_file, engine='xlsxwriter') as writer:
    selected_counts_colors.to_excel(writer, sheet_name='Counts', index=False)
    
    # Access the xlsxwriter workbook and worksheet
    workbook = writer.book
    worksheet = writer.sheets['Counts']
    
    # Create a chart object
    chart = workbook.add_chart({'type': 'line'})
    
    # Configure the series of the chart from the DataFrame data
    max_row = len(selected_counts_colors) + 1
    chart.add_series({
        'name':       '=Counts!$B$1',
        'categories': f'=Counts!$A$2:$A${max_row}',
        'values':     f'=Counts!$B$2:$B${max_row}',
        'line':       {'color': 'blue'},  # Placeholder color, adjust as needed
    })
    chart.add_series({
        'name':       '=Counts!$C$1',
        'categories': f'=Counts!$A$2:$A${max_row}',
        'values':     f'=Counts!$C$2:$C${max_row}',
        'line':       {'color': 'red'},  # Placeholder color, adjust as needed
    })

    # Configure the chart axes
    chart.set_x_axis({'name': 'Phase Name'})
    chart.set_y_axis({'name': 'Count'})

    # Set the chart title
    chart.set_title({'name': 'Counts by Phase for Driving and Parking with Colors'})

    # Insert the chart into the worksheet, not covering the data table
    worksheet.insert_chart('E2', chart)

# The Excel file is now created with a line chart for driving and parking phases with their respective colors
print(f"Excel file '{excel_file}' has been created.")
