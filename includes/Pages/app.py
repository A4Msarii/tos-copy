from flask import Flask, render_template
import json

app = Flask(__name__)

# Define the path to the session data file
file_path = 'C:\\xampp\\htdocs\\latest\\TOS\\session_data.json'

@app.route('/')
def home():
    try:
        with open(file_path, 'r') as file:
            session_data = json.load(file)
            return render_template('display.html', session_data=session_data)
    except FileNotFoundError:
        return "Session data file not found. Please check the file path and permissions."
    except json.JSONDecodeError:
        return "Error decoding JSON from file. Please check the file's contents."

if __name__ == '__main__':
    app.run(debug=True)
