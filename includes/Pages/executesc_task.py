import sys
import os
from datetime import datetime, timedelta
import subprocess
import time

# Parse command-line arguments received from PHP
export_file_path = sys.argv[1]
scheduled_date = sys.argv[2]
scheduled_time = sys.argv[3]

# Combine date and time strings to create a datetime object
scheduled_datetime_str = f"{scheduled_date} {scheduled_time}"
scheduled_datetime = datetime.strptime(scheduled_datetime_str, "%Y-%m-%d %H:%M")

# Get the current datetime
current_datetime = datetime.now()

# Calculate the time difference in seconds
time_difference = (scheduled_datetime - current_datetime).total_seconds()

# Check if the scheduled time is in the future
if time_difference <= 0:
    print("Error: Scheduled time must be in the future.")
    sys.exit(1)

# Sleep until the scheduled time
time.sleep(time_difference)

# Database credentials
db_host = 'localhost'
db_user = 'root'
db_password = ''
db_name = 'your_database_name'

# Export the database using mysqldump
try:
    subprocess.run(
        ["mysqldump", "-h", db_host, "-u", db_user, f"--password={db_password}", db_name],
        stdout=open(export_file_path, 'w'),
        stderr=subprocess.PIPE,
        check=True,
        text=True,
    )
    print(f"Database export completed. File saved to: {export_file_path}")
except subprocess.CalledProcessError as e:
    print(f"Error exporting database: {e.stderr}")
    sys.exit(1)
