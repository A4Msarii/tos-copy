from flask import Flask, request, jsonify, redirect, session, render_template, url_for, make_response
import jwt
from jwt.exceptions import InvalidTokenError
from functools import wraps
import logging
import os
import random  # Import the random module

# Specify the custom template directory
template_dir = os.path.abspath('C:/xampp/htdocs/latest/TOS/includes/Pages/templates')
app = Flask(__name__, template_folder=template_dir)

logging.basicConfig(filename='flask_app.log', level=logging.DEBUG, format='%(asctime)s - %(name)s - %(levelname)s - %(message)s')

@app.after_request
def add_header(response):
    response.cache_control.no_store = True
    return response

app.config['SEND_FILE_MAX_AGE_DEFAULT'] = 0
app.secret_key = 'Zz5tw0Ionm3XPZZfN0NOml3z9FMfmpgXwovR9fp6ryDIoGRM8EPHAB6iHsc0fb'

blacklist = set()

def no_cache(f):
    @wraps(f)
    def decorated_function(*args, **kwargs):
        resp = make_response(f(*args, **kwargs))
        resp.headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, max-age=0'
        resp.headers['Pragma'] = 'no-cache'
        resp.headers['Expires'] = '0'
        return resp
    return decorated_function

@app.route('/show-session', methods=['GET'])
@no_cache
def show_session():
    token = request.args.get('token')
    app.logger.debug(f"Received token: {token}")  # Log the received token
    if token:
        if token in blacklist:
            app.logger.warning(f"Access denied for token: {token}")
            return "Access denied. You have logged out.", 403

        try:
            decoded = jwt.decode(token, app.secret_key, algorithms=["HS256"])
            app.logger.info(f"Token decoded successfully for token: {token}")
            user_data = decoded.get('userData', {})
            app.logger.debug(f"Decoded user data: {user_data}")  # Log the decoded user data
            return render_template('crewData.html', jwt_token=token, user_data=user_data)  # Pass jwt_token to the template
        except InvalidTokenError as e:
            app.logger.error(f"Invalid token error for token {token}: {str(e)}")
            return "Invalid token: " + str(e), 401
    app.logger.warning("No token provided")
    return "No token provided", 400


@app.route('/protected-route')
@no_cache
def protected_route():
    token = request.args.get('token')
    if not token or token in blacklist:
        # Redirect to login page or return an error
        return redirect(url_for('login'))  # Assuming 'login' is a route for the login page

    try:
        decoded = jwt.decode(token, app.secret_key, algorithms=["HS256"])
        # Continue with the route's functionality if token is valid
        return "Access to protected content"  # Replace with your actual content
    except InvalidTokenError:
        return redirect(url_for('login'))

@app.route('/logout', methods=['POST'])
def logout():
    app.logger.debug(f'Received form data: {request.form}')
    app.logger.debug(f'Received headers: {request.headers}')
    
    token = request.form.get('token')
    app.logger.debug(f'Received token: {token}')  # Add this line for debugging
    
    if token:
        blacklist.add(token)
        app.logger.info(f'User with token {token} logged out.')
    else:
        app.logger.warning('Attempted logout without a token.')
    
    session.pop('login_id', None)
    
    # Generate a random number as a query parameter
    random_query_param = random.random()
    # Add the random query parameter to the URL to prevent caching
    return redirect(f"https://localhost/latest/TOS/includes/pages/logout.php?random={random_query_param}")

if __name__ == '__main__':
    app.run(debug=True, port=5000)
