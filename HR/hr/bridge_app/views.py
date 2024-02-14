import jose
import os
from jose import jwt
from jose.exceptions import JWTError, JOSEError  # Import JOSEError
from django.http import JsonResponse, HttpResponse, HttpResponseRedirect, HttpResponseForbidden
from django.shortcuts import render, redirect, get_object_or_404  # Added get_object_or_404 here
from .models import User, Employee  # Import Employee model here
import logging
from time import time
from django.contrib.auth import logout
import requests
from django.views.decorators.cache import never_cache, cache_control  # Combine cache imports
import random
import datetime
from decimal import Decimal, InvalidOperation
import uuid
from django.views.decorators.http import require_POST
from django.views.decorators.csrf import csrf_exempt
from functools import wraps
from .models import BlacklistedToken
from django.contrib.auth.decorators import login_required
from django.views.decorators.csrf import ensure_csrf_cookie
from django.db import transaction, IntegrityError
from django.core.exceptions import ValidationError
from decimal import Decimal, InvalidOperation
from django.core.files.storage import FileSystemStorage

from django.utils.safestring import mark_safe

import codecs
from django.core.files.uploadedfile import InMemoryUploadedFile
import base64
import traceback
from django.utils.encoding import force_bytes
from datetime import datetime
from django.contrib import messages
from django.contrib.sessions.models import Session
from django.views.decorators.http import require_http_methods
from django.conf import settings
# from .decorators import prevent_access_after_logout
from django.contrib.auth.decorators import user_passes_test
from jose import jwt, exceptions
from .models import UserPreferences 
import json



# Define the JWT key (the same key used to encode the token in your PHP code)
jwt_key = "Zz5tw0Ionm3XPZZfN0NOml3z9FMfmpgXwovR9fp6ryDIoGRM8EPHAB6iHsc0fb"
blacklist = set()
# current_datetime = datetime.datetime.now()
# Create a logger instance
logger = logging.getLogger(__name__)

@login_required
def test_logout_view(request):
    # This view is only accessible to authenticated users
    return render(request, 'test_logout.html', {})


def custom_logout_page(request):
    return render(request, 'custom_logout_page.html')


def validate_jwt_token(request):
    token = request.GET.get('token')
    logger = logging.getLogger(__name__)
    
    logger.debug(f"Received token for validation: {token}")

    if token is None:
        logger.error("Token is missing from the request.")
        return None

    if BlacklistedToken.objects.filter(token=token).exists():
        logger.error(f"Token is blacklisted: {token}")
        return None

    try:
        payload = jose.jwt.decode(token, jwt_key, algorithms=['HS256'])
        user_data = payload.get('userData', {})
        logger.debug(f"Token successfully decoded. User data: {user_data}")
        return user_data
    except jose.exceptions.ExpiredSignatureError:
        logger.error(f"Token has expired: {token}")
        return None
    except JWTError as e:
        logger.error(f"Token validation error: {e}")
        return None




# Function to generate a JWT token
def generate_jwt_token(request):
    user_data = {
        "nickname": request.session.get('nickname'),
        "login_id": request.session.get('login_id'),
        "inst_id": request.session.get('inst_id'),
        "role": request.session.get('role'),
        "department_Id": request.session.get('department_Id')
    }

    jwt_key = 'Zz5tw0Ionm3XPZZfN0NOml3z9FMfmpgXwovR9fp6ryDIoGRM8EPHAB6iHsc0fb'
    return jose.jwt.encode({"userData": user_data, "exp": time() + (60 * 60 * 4)}, jwt_key, algorithm='HS256')




def is_token_expired(token):
    if not token:
        # If token is None, consider it as expired for safety
        return True

    try:
        # Decode the token with signature verification
        payload = jwt.decode(token, settings.SECRET_KEY, algorithms=['HS256'])
        exp = payload.get('exp')
        return datetime.fromtimestamp(exp) < datetime.now()
    except exceptions.ExpiredSignatureError:
        # Explicitly handle expired token
        logger.error("Token has expired")
        return True
    except exceptions.JWTError as e:
        # Handle other JWT related errors (e.g., invalid token)
        logger.error(f"JWT error: {e}")
        return True
    except Exception as e:
        # Handle other generic exceptions
        logger.error(f"Error checking token expiration: {e}")
        return True



def token_required(view_func):
    @wraps(view_func)
    def wrapper(request, *args, **kwargs):
        user_data = validate_jwt_token(request)
        if not user_data:
            logger.warning("Access denied due to invalid or expired token.")
            return HttpResponseForbidden("Access denied. Invalid or expired token.")
        logger.debug("Token validated successfully")
        # Pass user_data to the view
        return view_func(request, user_data, *args, **kwargs)
    return wrapper



def protected_view(request):
    # Check if the "user_logged_out" flag is set in the session
    if request.session.get("nickname"):
        return HttpResponse("Access denied. Please log in.")
    
    # Your view logic for the protected view goes here
    # You can render a template or perform any other actions
    
    return render(request, "access_denied.html")


def is_user_logged_out(user):
    return not user.is_authenticated or user.session.get('user_logged_out', False) == True


def settings_view(request):
    # Retrieve the JWT token from the session
    jwt_token = request.session.get('jwt_token')

    # Check if the JWT token exists in the session
    if jwt_token:
        context = {'token': jwt_token}
    else:
        # Handle the case where there's no token. 
        # You might want to generate a new token or handle it differently
        context = {'token': 'No token available'}

    return render(request, 'settings.html', context)


def get_default_user():
    # You can customize the default user as needed
    default_user, created = User.objects.get_or_create(username='default_user')

    if created:
        # Set any default attributes for the default user if necessary
        default_user.email = 'default@example.com'
        default_user.save()

    return default_user


# views.py
def update_tshirt_size(request):
    if request.method == 'POST':
        tshirt_size = request.POST.get('tshirtSize')
        user_id = request.user.id  # Assuming the user is authenticated

        # Update the employee's t-shirt size
        employee = Employee.objects.get(user_id=user_id)
        employee.tshirtsize = tshirt_size
        employee.save()

        return redirect('user_detail', user_id=user_id)
    

def get_roles(request):
    roles = User.objects.values_list('role', flat=True).distinct()
    return JsonResponse({'roles': list(roles)})    


def get_reporting_managers(request):
    reporting_managers = User.objects.values_list('reportingmanager', flat=True).distinct()
    return JsonResponse({'reporting_managers': list(reporting_managers)})


global_role_preference = None 
global_report_preference= None
@csrf_exempt  # Disable CSRF protection for this view (only for demonstration, not recommended in production)
def save_designation_preferences(request):
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            designation_preference = data.get('designation', False)
            email_preference = data.get('email_id', False)
            phone_preference = data.get('phone', False)
            team_preference = data.get('team',False)
            citycountry_preference = data.get('citycountry',False)
            projects_preference = data.get('projects',False)
            reportingmanager_preference = data.get('reportingmanager',False)
            role_preference = data.get('role', None)
            report_preference = data.get('report',None)
            time_format_preference = data.get('timeFormat', None)  
            time_zone_preference = data.get('timeZone', None)
            print(f"Received data: {data}")
            logger.debug("global_role_preference (Before Setting): %s", request.session.get('global_role_preference', None))
            logger.debug("global_report_preference (Before Setting): %s", request.session.get('global_report_preference', None))



            valid_roles = User.objects.values_list('role', flat=True).distinct()
            valid_report_preferences = User.objects.values_list('reportingmanager', flat=True).distinct()
            if role_preference:
                # Check if the role is valid
                if role_preference not in valid_roles and role_preference != 'Dynamic Role':
                    return JsonResponse({'error': 'Invalid role preference'}, status=400)

                # Set the role preference (assuming it's a global variable)
                request.session['global_role_preference'] = role_preference
                logger.debug("global_role_preference (After Setting): %s", role_preference)


            if report_preference:
                # Check if the report preference is valid, including 'Dynamic Role'
                if report_preference not in valid_report_preferences and report_preference != 'Dynamic Report':
                    return JsonResponse({'error': 'Invalid report preference'}, status=400)

                

                # Set the role preference (assuming it's a global variable)
                request.session['global_report_preference'] = report_preference
                logger.debug("global_report_preference (After Setting): %s", report_preference)    

            # Update the preferences for all users
            UserPreferences.objects.update(
                display_designation=designation_preference,
                display_email=email_preference,
                display_phone=phone_preference,
                display_team=team_preference,
                display_citycountry=citycountry_preference,
                display_reporting_manager=reportingmanager_preference,
                display_projects=projects_preference,
                time_format=time_format_preference,
                time_zone=time_zone_preference 

            )

            return JsonResponse({'message': 'Preferences saved successfully'})
        except json.JSONDecodeError:
            return JsonResponse({'error': 'Invalid JSON'}, status=400)
        except Exception as e:
            # Log the exception
            logger.exception("An error occurred:", exc_info=e)
            return JsonResponse({'error': 'An error occurred'}, status=500)
    else:
        return JsonResponse({'error': 'Invalid request'}, status=400)

        


@cache_control(no_cache=True, must_revalidate=True, no_store=True)
@never_cache
def user_list(request):
    try:
        logger.debug("Entering user_list view")

        # Retrieve and save JWT token from query parameters
        jwt_token = request.GET.get('token')
        if jwt_token:
            request.session['jwt_token'] = jwt_token
            logger.debug(f"JWT token saved in session: {jwt_token}")
        else:
            logger.debug("No JWT token found in query parameters.")

        # Check if the JWT token is in the session (for subsequent requests)
        session_jwt_token = request.session.get('jwt_token')
        if session_jwt_token:
            logger.debug(f"JWT token retrieved from session: {session_jwt_token}")
        else:
            logger.debug("No JWT token found in session.")

        # Your existing logic for validating the JWT token
        user_data = validate_jwt_token(request)
        if user_data and 'nickname' in user_data:
            logger.debug(f"User authenticated with nickname: {user_data['nickname']}")

            
            # Add additional logic here if needed
        else:
            logger.warning("User not authenticated or nickname missing in JWT token")
    
        # Your existing logic for the user list
        if user_data:
            logger.debug(f"user_data before rendering the template: {user_data}")

            # JWT token is valid, proceed with retrieving the list of users
            users = User.objects.all()
            logger.info(f"Number of users retrieved: {len(users)}")

            # Generate a new JWT token or use existing logic
            token = generate_jwt_token(request)

            # Log details about each user
            for user in users:
                logger.debug(f"User ID: {user.id}, Name: {user.name}, Email: {user.email}")
                logger.debug(f"User ID before: {user.id}, Designation before: {user.designation}")
                logger.debug(f"User ID: {user.id}, Designation: {user.designation}")

                # if user.userpreferences.display_designation and user.designation:
                #     logger.debug(f"User ID: {user.id}, Designation: {user.designation}")
    


           



            user_preferences = {}
            for user in users:
                preferences = UserPreferences.objects.get_or_create(user=user)[0]
                user_preferences[user.id] = preferences 
                logger.debug(f"UserPreferences for User ID {user.id}: "
                f"display_name={preferences.display_name}, "
                f"display_designation={preferences.display_designation}, "
                f"display_phone={preferences.display_phone}, "
                f"display_citycountry={preferences.display_citycountry}, "
                f"display_projects={preferences.display_projects}, "
                f"display_reporting_manager={preferences.display_reporting_manager}, "
                f"display_email={preferences.display_email}")


            global_role_preference = request.session.get('global_role_preference', None)
            logger.debug("global_role_preference (Retrieved from Session): %s", global_role_preference)


    

            return render(request, 'user1.html', {'users': users, 'user_preferences': user_preferences, 'token': token, 'user_data': user_data, 'global_role_preference': global_role_preference})
        else:
            # Invalid or expired token logic
            logger.warning("Access denied due to invalid or expired token")
            return render(request, 'access_denied.html')  # Create an 'access_denied.html' template

    except Exception as e:
        # Log any exceptions that occur
        logger.exception("An error occurred in the user_list view:", exc_info=e)
        return HttpResponse("An error occurred.", status=500)

# Define the validate_jwt_token, generate_jwt_token, and other functions or imports as required


def generate_jwt_token_for_user(user):
    # Generate a JWT token for the specific user
    payload = {
        "userData": {
            "user_id": user.id,
            # Add other user data here
        },
        "exp": time() + (60 * 60 * 4)  # 4-hour expiration
    }
    return jwt.encode(payload, jwt_key, algorithm='HS256')


@never_cache
def user_detail(request, user_id):
    logger.debug(f"Request headers: {request.headers}")
    logger.debug(f"Request GET parameters: {request.GET}")

    # Retrieve the token from the URL query parameters
    token = request.GET.get('token')

    if token:
        # Set the token in the session for future requests (if needed)
        request.session['jwt_token'] = token


        

        try:
            # Retrieve user data
            user = get_object_or_404(User, id=user_id)
            # Try to retrieve the corresponding employee data
            try:
                employee = Employee.objects.get(user=user)

            except Employee.DoesNotExist:
                employee = None

            # Pass both user and employee data to the template
            return render(request, 'user_detail.html', {'user': user, 'employee': employee, 'token': token})
        except Exception as e:
            # Log any exceptions that occur
            logger.exception("An error occurred while processing the user detail:")
            return HttpResponse("An error occurred.", status=500)
    else:
        logger.warning("Token is missing")
        return HttpResponse("Token is missing", status=401)
    


@never_cache
def search_users(request):
    # Validate the JWT token
    user_data = validate_jwt_token(request)

    if user_data:
        query = request.GET.get('q', '')
        # Assuming you want to return 'name' and 'employee_id', add other fields as needed
        users = list(User.objects.filter(name__icontains=query).values('name', 'employee_id'))
        return JsonResponse(users, safe=False)
    else:
        return JsonResponse({'error': 'Invalid or expired token'}, status=401)

# @never_cache
# def register_user(request):
#     if request.method == 'POST':
#         logger.debug("POST Data: %s", request.POST)
#         # Compulsory fields
#         name = request.POST.get('name')
#         user_id = request.POST.get('id')  # Make sure 'id' aligns with your form field name
#         email = request.POST.get('email')

#         # Optional fields
#         nickname = request.POST.get('nickname', None)
#         designation = request.POST.get('designation', '')
#         teamunit = request.POST.get('teamunit', '')
#         phone = request.POST.get('phone', '')
#         citycountry = request.POST.get('citycountry', '')
#         languages = request.POST.get('languages', '')

#         # Create User object
#         new_user = User(
#             name=name, 
#             id=user_id, 
#             email=email, 
#             nickname=nickname, 
#             designation=designation,
#             teamunit=teamunit,
#             phone=phone,
#             citycountry=citycountry,
#             languages=languages
#             # ... include other optional fields similarly
#         )
#         new_user.save()
#         return redirect('user_list')
#     else:
#         user_data = validate_jwt_token(request)
#         if user_data:
#             return render(request, 'register_user.html', {'user_data': user_data})
#         else:
#             return HttpResponse("Invalid or expired token")
    
@never_cache
def user_edit(request, user_id):
    # Get the user instance
    user = User.objects.get(id=user_id)
    logger.info("Initial value of user.name: %s", user.name)
    logger.info("Initial value of user.designation: %s", user.designation)  # Log current designation

    # Try to get the related employee instance if it exists
    try:
        employee = Employee.objects.get(user=user)
    except Employee.DoesNotExist:
        employee = None  # Set employee to None if it doesn't exist

    # Initialize the hobbies list
    all_hobbies = [
        ("hobby1", "Cricket"),
        ("hobby2", "Shopping"),
        ("hobby3", "Basketball"),
        ("reading", "Reading"),
        ("dancing", "Dancing"),
        ("other", "Other"),
    ]

    if request.method == 'POST':
        print(request.POST)
        print("userName from form:", request.POST.get('userName'))
        print("userDesignation from form:", request.POST.get('userDesignation'))

        # Process the form data for the User model
        if 'userName' in request.POST:
            user.name = request.POST['userName']
        if 'userDesignation' in request.POST:
            user.designation = request.POST['userDesignation']
        logging.debug(f"POST data received: {request.POST}")
        logging.debug(f"Value of user.name after updating: {user.name}")
        logging.debug(f"Value of user.designation after updating: {user.designation}")
        print("New designation value:", user.designation)  # Log new designation value
        user.email = request.POST.get('userEmail')
        user.citycountry = request.POST.get('userCity')
        user.languages = request.POST.get('userLanguage')
        user.country = request.POST.get('Country')
        user.gender = request.POST.get('userGender')
        if 'userProjects' in request.POST:
            user.projects = request.POST['userProjects']

        country_code = request.POST.get('countryCode')
        phone_number = request.POST.get('phoneNoInput')

        # Concatenate country code and phone number
        if country_code and phone_number:
            full_phone_number = country_code + phone_number
        else:
            # Handle the case where one of them is empty (or both)
            full_phone_number = ""

        # Assign the concatenated phone number to the user object
        user.phone = full_phone_number

        # user.phone = request.POST.get('userPhone')
        user.city = request.POST.get('userCity')
        user.reportingmanager = request.POST.get('userRM')
        doj_value = request.POST.get('doj')
        if doj_value:  # Check if bday is not empty
            user.doj = doj_value  # ... handle other fields for the User model ...

        if employee:
            # Process the form data for the Employee model
            print("Value from form:", request.POST.get('bday'))
            bday_value = request.POST.get('bday')
            if bday_value:  # Check if bday is not empty
                employee.bday = bday_value
            print("Value assigned to employee.bday:", employee.bday)

            employee.tshirtsize = request.POST.get('tshirtsize')
            employee.mailaddress = request.POST.get('mailaddress')
            employee.recentpraises = request.POST.get('recentpraises')
            employee.culturalaffiliation = request.POST.get('culturalaffiliation')
            employee.Landmark = request.POST.get('landmark')
            selected_hobby = request.POST.get('hobbies')

            if selected_hobby == 'other':
                custom_hobby = request.POST.get('customHobby')
                employee.hobbies = custom_hobby
            else:
                employee.hobbies = selected_hobby

            employee.learninggoals = request.POST.get('learninggoals')
            employee.skills_inspiration = request.POST.get('skills_inspiration')
            employee.abouther = request.POST.get('abouther')
            employee.wordsfromher = request.POST.get('wordsfromher')
            employee.save()  # Save the Employee instance

        print("User's name before update:", user.name)
        user.save()  # Save the User instance
        messages.success(request, 'Edit data successfully.')
        print("User's name after update:", user.name)  # Log updated user name
        return redirect('success')  # Redirect to a success page or another view

    # Set selected_hobby based on the user's current hobby (for GET requests)
    selected_hobby = employee.hobbies if employee else None

    # Debugging statements
    print("selected_hobby:", selected_hobby)
    print("all_hobbies:", all_hobbies)

    # Render the template with the user and employee instances and the list of hobbies
    return render(request, 'user_detail.html', {'user': user, 'employee': employee, 'all_hobbies': all_hobbies, 'selected_hobby': selected_hobby})


@csrf_exempt
def success(request):
    return HttpResponse("User data updated successfully.")


def my_goals_view(request):
    try:
        # Retrieve user data or any other necessary information
        user_data = {
            "nickname": request.session.get('nickname'),
            "login_id": request.session.get('login_id'),
            "inst_id": request.session.get('inst_id'),
            "role": request.session.get('role'),
            "department_Id": request.session.get('department_Id'),
            # Add other user-related data as needed
        }

        # Generate a JWT token with the user data
        token = jwt.encode({"userData": user_data}, jwt_key, algorithm='HS256')

        # Render the "mygoals" template with the token in the context
        return render(request, 'mygoals.html', {'token': token})
    
    except Exception as e:
        # Handle any exceptions that may occur
        return JsonResponse({'error': 'An error occurred'}, status=500)


allowed_file_types = ['pdf', 'jpg', 'jpeg', 'png', 'gif', 'xlsx', 'doc', 'docx']

def employee_educational_details(request, user_id):
    logging.debug(f"Request method: {request.method}")
    logging.debug(f"Received user_id: {user_id}")

    try:
        user = get_object_or_404(User, id=user_id)
        logging.debug(f"User found: {user.name}")
    except Exception as e:
        logging.error(f"User retrieval failed: {e}", exc_info=True)
        return render(request, 'error_page.html', {'error': str(e)})

    try:
        employee, created = Employee.objects.get_or_create(user=user)
        logging.debug(f"Employee found/created: {employee}, Created: {created}")
    except Exception as e:
        logging.error(f"Employee object handling failed: {e}", exc_info=True)
        return render(request, 'error_page.html', {'error': str(e)})

    if request.method == 'POST':
        logging.debug("Processing POST request")
        logging.debug(f"Form data received: {request.POST}")

        # Initialize a message
        message = ""

        # Process file fields
        fields_to_handle = {
            'educational_proofs',
            'policy_acknowledgment',
            'government_proofs',
            'offer_promotions'  # Add other fields as needed
        }

        try:
            for field_name in fields_to_handle:
                if field_name in request.FILES:
                    file_data = request.FILES[field_name]
                    file_extension = file_data.name.split('.')[-1].lower()

                    if file_extension not in allowed_file_types:
                        logging.warning(f"Disallowed file type for {field_name}: {file_extension}")
                        return HttpResponseBadRequest("File type not allowed")

                    binary_data = file_data.read()
                    setattr(employee, field_name, binary_data)
                    logging.debug(f"Set binary data for {field_name}, Type: {type(binary_data)}")
                    message += mark_safe(f'\n{field_name.replace("_", " ").title()} updated')

            # Process other form fields
            entry_salary_str = request.POST.get('entrySalary', '').strip()
            if entry_salary_str:
                try:
                    employee.entry_salary = Decimal(entry_salary_str)
                    message += "\nEntry Salary updated"
                except InvalidOperation:
                    logging.error("Invalid format for entry_salary")

            joining_date_str = request.POST.get('joiningDate', '').strip()
            if joining_date_str:
                try:
                    employee.joining_date = datetime.strptime(joining_date_str, "%Y-%m-%d").date()
                    message += "\nJoining Date updated"
                except ValueError:
                    logging.error("Invalid date format for joining_date")

            probation_duration_str = request.POST.get('probationDuration', '').strip()
            if probation_duration_str:
                try:
                    employee.probation_duration = datetime.strptime(probation_duration_str, "%Y-%m-%d").date()
                    message += "\nProbation Duration updated"
                except ValueError:
                    logging.error("Invalid date format for probation_duration")

            # Process hike data
            first_hikes = request.POST.getlist('firstHike')
            hike_percentages = request.POST.getlist('hikePercentage')
            hike_dates = request.POST.getlist('hikeDate')

            for i in range(len(first_hikes)):
                first_hike = first_hikes[i]
                hike_percentage_str = hike_percentages[i]
                hike_date_str = hike_dates[i]

                try:
                    employee.hike_percentage = Decimal(hike_percentage_str)
                    employee.hike_date = datetime.strptime(hike_date_str, "%Y-%m-%d").date()
                    employee.first_hike = first_hike
                    messages.success(request, f'<span style="color: green;">Hike {i + 1} added: First Hike - {first_hike}, Hike Percentage - {hike_percentage_str}, Hike Date - {hike_date_str}</span>')
                except (InvalidOperation, ValueError) as e:
                    logging.error(f"Error processing hike data at index {i}: {e}")
                    # Handle the error, maybe accumulate it to show to the user later

            # Save all changes to the employee
            with transaction.atomic():
                employee.save()
                messages.success(request, message)

            logging.debug("Employee saved successfully")
            return redirect('success')

        except ValidationError as e:
            logging.error(f"Validation error in POST request: {e}", exc_info=True)
            return render(request, 'user_detail.html', {'employee': employee, 'user_id': user_id, 'errors': e.messages})
        
        except Exception as e:
            logging.error("An unexpected error occurred: %s", traceback.format_exc())
            return render(request, 'error_page.html', {'error': str(e)})

    else:
        logging.debug("Rendering form for GET request or initially")
        return render(request, 'user_detail.html', {'employee': employee, 'user_id': user_id})




def register_user(request):
    global global_role_preference 
    logger.debug("global_role_preference (Before POST): %s", global_role_preference)

    if request.method == 'POST':
        try:
            # Log the received POST data (be cautious with sensitive data)
            logger.debug("Received POST Data: %s", request.POST)
            global_role_preference = request.session.get('global_role_preference', None)
            logger.debug("global_role_preference (Retrieved from Session): %s", global_role_preference)


            print("DEBUG: Received POST Data:", request.POST)  # Print statement for debugging

            # Extracting data from the POST request
            name = request.POST.get('name')
            user_id = request.POST.get('id')  # Assuming 'id' is the correct form field name
            email = request.POST.get('email')
            # global_role_preference = request.POST.get('global_role_preference')  # Retrieve global_role_preference from the form data

            logger.debug("Selected Role (Before Processing): %s", global_role_preference)
            
            
            # ... (extract other compulsory fields as per your form)

            # Print extracted data for debugging
            print("DEBUG: Extracted Data - Name: {}, ID: {}, Email: {}".format(name, user_id, email))

            # Optional fields with defaults or None
            nickname = request.POST.get('nickname', None)
            designation = request.POST.get('designation', '')
            teamunit = request.POST.get('teamunit', '')
            phone = request.POST.get('phone', '')
            citycountry = request.POST.get('citycountry', '')
            languages = request.POST.get('languages', '')
            projects = request.POST.get('projects', '')
            reportingmanager =  request.POST.get('reportingmanager', '')
            country = request.POST.get('country', '')
            doj_str = request.POST.get('doj', '')
            doj = None
            if doj_str:
                try:
                    doj = datetime.strptime(doj_str, '%Y-%m-%d').date()
                except ValueError:
                    return JsonResponse({'status': 'error', 'message': 'Invalid date format for DOJ. It must be in YYYY-MM-DD format.'})

# ... [code for creating User object and saving it] ...

            # Print optional data for debugging
            print("DEBUG: Optional Data - Nickname: {}, Designation: {}, Teamunit: {}".format(nickname, designation, teamunit))

            if 'file' in request.FILES:
                file = request.FILES['file']
                fs = FileSystemStorage(location='C:/xampp/htdocs/latest/TOS/includes/Pages/upload')
                file_name = fs.save(file.name, file)
                file_url = fs.url(file_name)
    # You can store file_name or file_url in your User model

    # Print file details for debugging
            print("DEBUG: File Uploaded - Name: {}, URL: {}".format(file_name, file_url))


            # Creating the User object
            new_user = User(
                name=name,
                projects=projects,
                reportingmanager=reportingmanager,
                doj=doj,
                id=user_id, 
                country=country,
                email=email, 
                nickname=nickname, 
                designation=designation,
                teamunit=teamunit,
                phone=phone,
                citycountry=citycountry,
                languages=languages,
                role=global_role_preference,
                # ... (other fields)
            )

            # Print user object details for debugging
            print("DEBUG: New User Object Created -", new_user)

            with transaction.atomic():
                # Save the new user
                new_user.save()
                print("DEBUG: New user saved successfully")  # Print statement for successful save
                print("DEBUG: New user saved with ID:", new_user.id)

            logger.debug("New user saved successfully.")
            
            return JsonResponse({'status': 'success', 'message': 'Registration successful'})

        except IntegrityError as e:
            # Handle database integrity errors
            logger.error("IntegrityError occurred during user registration: %s", e)
            print("ERROR: IntegrityError -", e)  # Print statement for debugging
            print("DEBUG: User data:", new_user.__dict__)
            return JsonResponse({'status': 'error', 'message': 'IntegrityError: Data could not be saved.'})
        
        except Exception as e:
            # Log any other exceptions that occur
            logger.error("An error occurred during user registration: %s", e)
            print("ERROR: Exception -", e)  # Print statement for debugging
            return JsonResponse({'status': 'error', 'message': str(e)})

    else:
        # Handling for non-POST requests
        logger.warning("Non-POST request received")
        print("WARNING: Non-POST request received")  # Print statement for debugging
        return JsonResponse({'status': 'error', 'message': 'Invalid request method'})
    


@csrf_exempt
@require_http_methods(["GET", "POST"])
def logout_view(request):
    logger.debug(f"Session before logout: {dict(request.session.items())}")

    try:
        logger.info("Initiating logout process")

        # Retrieve the token from POST data or fallback to session
        token = request.POST.get('token') or request.session.get('jwt_token')
        if token:
            logger.debug(f"JWT token retrieved: {token}")
            # Add your token handling logic here (e.g., blacklisting)
            # Assuming is_token_expired and BlacklistedToken are defined elsewhere
            if not is_token_expired(token):  # Define is_token_expired function
                BlacklistedToken.objects.create(token=token)  # Assuming BlacklistedToken model is defined
                logger.info(f"Token {token} added to blacklist.")
            else:
                logger.info(f"Token {token} is already expired.")
        else:
            logger.debug("No JWT token found.")

        

        

        # Check if a specific key like 'user_data' still exists
        if 'user_data' in request.session:
          user_data = request.session['user_data']
          logger.info(f"User data before clearing from session: {user_data}")

        # Now clear 'user_data' from the session
          del request.session['user_data']
          logger.info("User data cleared from session")


        # Remove the JWT token from the session if it exists
        if 'jwt_token' in request.session:
            jwt_token = request.session.pop('jwt_token')
            logger.debug(f"JWT token removed from session: {jwt_token}")

        # Redirect to PHP script for further processing
        random_query_param = str(uuid.uuid4())
        redirect_url = f"https://localhost/latest/TOS/includes/pages/logout.php?random={random_query_param}"
        logger.info(f"Redirecting to PHP script for further logout processing: {redirect_url}")

        # Set a temporary cookie for logout
        response = HttpResponseRedirect(redirect_url)
        response.set_cookie('user_logged_out', 'True', max_age=10)  # lasts for 10 seconds
        logger.debug("Temporary logout cookie set")

        # Flush the session
        request.session.flush()
        logger.info("Session flushed successfully")

        # Set no-cache headers
        response['Cache-Control'] = 'no-store, no-cache, must-revalidate, max-age=0'
        response['Pragma'] = 'no-cache'
        response['Expires'] = '0'
        logger.debug("Cache control headers set to prevent caching of the response")

        logger.info("Django logout process completed successfully")
        return response

    except Exception as e:
        logger.exception("An error occurred during logout: ", exc_info=e)
        return HttpResponse("An error occurred during logout", status=500)

# Define is_token_expired and other necessary functions or imports here