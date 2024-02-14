from flask import Flask, request, jsonify
from flask_cors import CORS
import logging
from logging.handlers import RotatingFileHandler
import threading
import schedule
import time
import subprocess
from datetime import datetime, timedelta
import threading

# Initialize Flask app
app = Flask(__name__)
CORS(app)

# Set up logging
handler = RotatingFileHandler('job.txt', maxBytes=10000, backupCount=1)
formatter = logging.Formatter('%(asctime)s - %(message)s')
handler.setFormatter(formatter)
handler.setLevel(logging.INFO)
app.logger.addHandler(handler)
app.logger.setLevel(logging.INFO)

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

    app.logger.info(f"Local Time: {local_time}")
    app.logger.info(f"UTC Time: {utc_time}")
    app.logger.info(f"Time Zone: {time_zone}")

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

    app.logger.info("Request Headers: %s", request.headers)
    app.logger.info("Raw request data: %s", request.data.decode('utf-8'))

    try:
        task_data = request.get_json()

        if not task_data:
            return jsonify({'message': 'Invalid JSON data'}), 400

        export_path = task_data.get('export_path')
        schedule_frequency = task_data.get('schedule_frequency')
        scheduled_datetime = task_data.get('scheduled_datetime')

        # Your scheduling logic
        job = None
        if schedule_frequency == "daily":
            time_part = datetime.strptime(scheduled_datetime, '%H:%M').strftime('%H:%M')
            job = schedule.every().day.at(time_part).do(run_task, export_path)
        elif schedule_frequency == "weekly":
    # Parse the scheduled datetime
            datetime_obj = datetime.strptime(scheduled_datetime, '%Y-%m-%d %H:%M')
            current_datetime = datetime.now()

    # Calculate days until the next occurrence of the scheduled day
            days_until_next = (datetime_obj - current_datetime).days
            days_until_next = days_until_next + 7 if days_until_next < 0 else days_until_next
            time_part = datetime_obj.strftime('%H:%M')

    # Schedule the task for the first occurrence
            job = schedule.every(days_until_next).days.at(time_part).do(run_task, export_path)

    # Logic to reschedule the task for every 7 days should be inside run_task function
        elif schedule_frequency == "monthly":
            day_of_month = int(scheduled_datetime.split('-')[2].split(' ')[0])
            job = schedule.every().month.at(scheduled_datetime.split(' ')[1]).do(run_monthly_task, export_path, day_of_month)
        elif schedule_frequency == "every_min":
            job = schedule.every(1).minutes.do(run_task, export_path)
        else:
            return jsonify({'message': 'Invalid schedule frequency'}), 400
        
        # Store the job with its frequency
        if job:
            job.frequency = schedule_frequency  # Store the frequency in the job
            scheduled_tasks[export_path] = job  # Use export_path as the key, or consider using a unique identifier
            app.logger.info(f"Received Task - Export Path: {export_path}, Schedule Frequency: {schedule_frequency}, Scheduled Datetime: {scheduled_datetime}")
            return jsonify({'message': 'Task received and scheduled successfully'})
        else:
            return jsonify({'message': 'Error creating task schedule'}), 500

    except Exception as e:
        app.logger.error(f'Error receiving task: {str(e)}')
        return jsonify({'message': f'Error receiving task: {str(e)}'}), 500


@app.route('/view_tasks', methods=['GET'])
def view_tasks():
    tasks = []
    for key, job in scheduled_tasks.items():
        task_info = {
            'export_path': key,
            'schedule_frequency': getattr(job, 'frequency', 'Unknown'),  # Retrieve the stored frequency
            'scheduled_datetime': str(job.next_run)  # Next scheduled run time
        }
        tasks.append(task_info)

    return jsonify(tasks)


@app.route('/get_task')
def get_task():
    export_path = request.args.get('export_path')
    
    # Check if the task exists
    if export_path in scheduled_tasks:
        task = scheduled_tasks[export_path]

        # Assuming task is a dictionary with task details
        task_details = {
            'export_path': task.export_path,
            'schedule_frequency': task.schedule_frequency,
            'scheduled_datetime': str(task.next_run)  # or however you store the datetime
        }
        return jsonify(task_details)

    else:
        # Task not found
        return jsonify({'message': 'Task not found'}), 404
    



def run_task_at_specific_time(run_datetime, func, *args):
    def wait_until_run():
        # Wait until the run_datetime to call the function
        time_to_wait = (run_datetime - datetime.now()).total_seconds()
        if time_to_wait > 0:
            time.sleep(time_to_wait)
        func(*args)

    # Schedule the wait_until_run function to run immediately
    return schedule.every().second.do(wait_until_run).tag('specific_time')    


def add_task_after_delay(delay, schedule_function, *args, **kwargs):
    def delayed_job():
        try:
            app.logger.info(f"Waiting for {delay} seconds before scheduling the task.")
            time.sleep(delay)
            app.logger.info("Delay elapsed, scheduling the task now.")
            scheduled_job = schedule_function(*args, **kwargs)
            app.logger.info("Task scheduled after delay.")
            # Update scheduled_tasks here
            scheduled_tasks[args[0]] = scheduled_job
        except Exception as e:
            app.logger.error(f"Error in delayed job scheduling: {e}")

    threading.Thread(target=delayed_job).start()


@app.route('/edit_task', methods=['POST'])
def edit_task():
    try:
        task_data = request.get_json()
        app.logger.info(f"Received edit task data: {task_data}")

        original_export_path = task_data.get('original_export_path')
        new_export_path = task_data.get('new_export_path')
        new_schedule_frequency = task_data.get('new_schedule_frequency')
        new_scheduled_datetime = task_data.get('new_scheduled_datetime')

        if original_export_path in scheduled_tasks:
            app.logger.info(f"Original task details before deletion: {scheduled_tasks[original_export_path]}")
            schedule.cancel_job(scheduled_tasks[original_export_path])
            del scheduled_tasks[original_export_path]
            app.logger.info(f"Cancelled and deleted task: {original_export_path}")

        job = None
        datetime_obj = datetime.strptime(new_scheduled_datetime, '%Y-%m-%d %H:%M:%S')
        
        if new_schedule_frequency == "daily":
            # Parse the new scheduled datetime to get the time part
            time_part = datetime.strptime(new_scheduled_datetime, '%Y-%m-%d %H:%M:%S').strftime('%H:%M')
            start_date = datetime_obj.date()
            if start_date <= datetime.now().date():
               start_date = datetime.now().date()
            job = schedule.every().day.at(time_part).do(run_task, new_export_path, start_date)

        elif new_schedule_frequency == "weekly":
            target_datetime = datetime_obj
            current_datetime = datetime.now()

    # Calculate the number of days until the next occurrence of the target day
            days_ahead = (target_datetime.weekday() - current_datetime.weekday() + 7) % 7

            if days_ahead == 0 and current_datetime.time() > target_datetime.time():
              app.logger.info("Today is the target day but the time has already passed, scheduling for next week")
        # If today is the target day but the time has already passed, schedule for next week
              next_run_datetime = current_datetime + timedelta(days=7)
            else:
        # Otherwise, schedule it for the target day in the current week or the next
               app.logger.info("Scheduling for the target day in the current week or the next")
               next_run_datetime = current_datetime + timedelta(days=days_ahead)

    # Set the correct time for the next run
            next_run_datetime = next_run_datetime.replace(hour=target_datetime.hour, minute=target_datetime.minute, second=target_datetime.second, microsecond=0)
            app.logger.info(f"Next run datetime set to: {next_run_datetime}")
    # Schedule the task
            job = schedule.every(7).days.at(next_run_datetime.strftime('%H:%M')).do(run_task, new_export_path)
            app.logger.info(f"Scheduled task: {new_export_path}, Frequency: weekly, Next run: {job.next_run}")





        elif new_schedule_frequency == "monthly":
            day_of_month = datetime_obj.day
            time_part = datetime_obj.strftime('%H:%M')
            job = schedule.every().month.at(time_part).do(run_monthly_task, new_export_path, day_of_month)

        elif new_schedule_frequency == "every_min":
            job = schedule.every(1).minutes.do(run_task, new_export_path)

        if job:
            job.frequency = new_schedule_frequency
            scheduled_tasks[new_export_path] = job
            app.logger.info(f"Next run time of the rescheduled task: {job.next_run}")
            app.logger.info(f"Rescheduled task: {new_export_path} with frequency: {new_schedule_frequency}")
            return jsonify({'message': 'Task edited and rescheduled successfully'})
        else:
            app.logger.error("Failed to create a new schedule for the task")
            return jsonify({'message': 'Error creating task schedule'}), 500
    except Exception as e:
        app.logger.error(f'Error editing task: {e}', exc_info=True)
        return jsonify({'message': f'Error editing task: {e}'}), 500



@app.route('/delete_task', methods=['POST'])
def delete_task():
    try:
        task_data = request.get_json()
        export_path = task_data.get('export_path')

        if export_path in scheduled_tasks:
            schedule.cancel_job(scheduled_tasks[export_path])
            del scheduled_tasks[export_path]

            return jsonify({'message': 'Task deleted successfully'})
        else:
            return jsonify({'message': 'Task not found'}), 404

    except Exception as e:
        return jsonify({'message': f'Error deleting task: {str(e)}'}), 500




def add_header(response):
    response.headers['Cache-Control'] = 'no-store'
    return response

def run_weekly_task(export_path, day_of_week):
    if should_run_today(day_of_week, None):
        run_task(export_path)

def run_monthly_task(export_path, day_of_month):
    if should_run_today(None, day_of_month):
        run_task(export_path)

def run_task(export_path, start_date=None):
    current_date = datetime.now().date()
    if start_date and current_date < start_date:
        app.logger.info(f"Current date {current_date} is before the start date {start_date}, skipping execution.")
        return
    try:
        command = [
            "D:\\xampp\\mysql\\bin\\mysqldump.exe",
            "-h", "localhost",
            "-u", "root",
            "--no-create-info",
            "grade sheet",
            f"--result-file={export_path}"
        ]
        
        app.logger.info("Executing run_task function")
        subprocess.run(command, check=True)
        app.logger.info(f"Completed Task - Export Path: {export_path}")
    except subprocess.CalledProcessError as e:
        app.logger.error(f'Error executing task (Exit Code {e.returncode}): {str(e)}')
    except Exception as e:
        app.logger.error(f'Unexpected error: {str(e)}')

def run_scheduler():
    while True:
        schedule.run_pending()
        time.sleep(1)

if __name__ == '__main__':
    scheduler_thread = threading.Thread(target=run_scheduler)
    scheduler_thread.start()
    app.run(host='0.0.0.0', port=8000, debug=True, ssl_context='adhoc')

