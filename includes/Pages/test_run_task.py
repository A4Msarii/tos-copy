import logging
from flask import Flask, request, jsonify
from flask_cors import CORS
import schedule
import time
import subprocess
from datetime import datetime
import time
import pytz 







app = Flask(__name__)
CORS(app)

# Configure logging
logging.basicConfig(filename='task_log.txt', level=logging.INFO, format='%(asctime)s - %(message)s')

# Dictionary to store scheduled tasks
scheduled_tasks = {}


def should_run_today(day_of_week, day_of_month):
    today = datetime.today()
    return (today.weekday() == day_of_week) or (today.day == day_of_month)

@app.route('/check_time')
def check_time():
    local_time = datetime.now()
    utc_time = datetime.utcnow()
    time_zone = time.tzname

    logging.info(f"Local Time: {local_time}")
    logging.info(f"UTC Time: {utc_time}")
    logging.info(f"Time Zone: {time_zone}")

    return jsonify({
        "local_time": str(local_time),
        "utc_time": str(utc_time),
        "time_zone": time_zone
    })



@app.route('/receive_task', methods=['POST', 'GET', 'OPTIONS'])
def receive_task():
    if request.method == 'OPTIONS':
        response = jsonify({'message': 'Preflight request received'})
        return add_header(response), 200
    # Log raw request data
    logging.info("Raw request data: %s", request.data)

    try:
        task_data = request.get_json()

        if not task_data:
            return jsonify({'message': 'Invalid JSON data'}), 400

        export_path = task_data.get('export_path')
        schedule_frequency = task_data.get('schedule_frequency')
        scheduled_datetime = task_data.get('scheduled_datetime')

        if schedule_frequency == "daily":
            try:
                time_part = datetime.strptime(scheduled_datetime, '%H:%M').strftime('%H:%M')
                logging.info(f"Extracted time for daily job: {time_part}")
            except ValueError:
                return jsonify({'message': 'Invalid datetime format for daily job'}), 400

            job = schedule.every().day.at(time_part).do(run_task, export_path)
        elif schedule_frequency == "weekly":
            day_of_week = datetime.strptime(scheduled_datetime, '%Y-%m-%d %H:%M').weekday()
            job = schedule.every().day.at(scheduled_datetime.split(' ')[1]).do(run_weekly_task, export_path, day_of_week)
        elif schedule_frequency == "monthly":
            day_of_month = int(scheduled_datetime.split('-')[2].split(' ')[0])
            job = schedule.every().day.at(scheduled_datetime.split(' ')[1]).do(run_monthly_task, export_path, day_of_month)
        elif schedule_frequency == "every_min":
            job = schedule.every(1).minutes.do(run_task, export_path)
        else:
            return jsonify({'message': 'Invalid schedule frequency'}), 400

        scheduled_tasks[export_path] = job
        logging.info(f"Received Task - Export Path: {export_path}, Schedule Frequency: {schedule_frequency}, Scheduled Datetime: {scheduled_datetime}")
        scheduled_jobs = schedule.get_jobs()
        for job in scheduled_jobs:
           logging.info(f"Scheduled Job: {job}")

        return jsonify({'message': 'Task received and scheduled successfully'})
    except Exception as e:
        return jsonify({'message': f'Error receiving task: {str(e)}'}), 500

def run_weekly_task(export_path, day_of_week):
    if should_run_today(day_of_week, None):
        run_task(export_path)

def run_monthly_task(export_path, day_of_month):
    if should_run_today(None, day_of_month):
        run_task(export_path)

def run_task(export_path):
    try:
        command = [
            "C:\\xampp\\mysql\\bin\\mysqldump.exe",
            "-h", "localhost",
            "-u", "root",
            "grade sheet",
            f"--result-file={export_path}"
        ]
        
        print("Executing run_task function")
        # Add a log statement
        logging.info("Executing run_task function")

        print("Command:", " ".join(command))
        subprocess.run(command, check=True)
        logging.info(f"Completed Task - Export Path: {export_path}")
    except subprocess.CalledProcessError as e:
        logging.error(f'Error executing task (Exit Code {e.returncode}): {str(e)}')
    except Exception as e:
        logging.error(f'Unexpected error: {str(e)}')
        
        
def add_header(response):
    response.headers['Cache-Control'] = 'no-store'
    return response        

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8000)
    while True:
        schedule.run_pending()
        time.sleep(1)
