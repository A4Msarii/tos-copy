# custom_php_session_middleware.py

class PHPSessionMiddleware:
    def __init__(self, get_response):
        self.get_response = get_response

    def __call__(self, request):
        # Check the PHP session for authentication status
        is_authenticated = request.session.get('user_authenticated', False)

        # Store the authentication status in the Django session
        request.session['django_user_authenticated'] = is_authenticated

        response = self.get_response(request)
        return response
