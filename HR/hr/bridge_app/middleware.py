# bridge_app/middleware.py

from django.utils.deprecation import MiddlewareMixin
from django.http import HttpResponseRedirect
from django.urls import reverse
from django.shortcuts import redirect
from django.conf import settings
from django.core.exceptions import PermissionDenied
from django.http import HttpResponseForbidden
import logging
import datetime 
logger = logging.getLogger('django.middleware')


class NoCacheMiddleware(MiddlewareMixin):
    """
    Middleware that sets the "Cache-Control" header to "no-store" on all responses.
    """
    
    def __init__(self, get_response):
        
        self.get_response = get_response

    def __call__(self, request):
        response = self.get_response(request)
        response['Cache-Control'] = 'no-store'
        return response

    

class PreventAccessAfterLogoutMiddleware:
    def __init__(self, get_response):
        self.get_response = get_response

    def __call__(self, request):
        print("Middleware called") 
        # Define the URLs you want to restrict after logout
        restricted_urls = ['/users/', '/another_restricted_url/']

        # Check if user has logged out and is trying to access restricted URLs
        if request.COOKIES.get('user_logged_out') == 'True' and any(request.path.startswith(url) for url in restricted_urls):
            print(f"Prevented access to {request.path} after logout.")  # Use print for debugging
            return HttpResponseForbidden("Access is forbidden after logout.")

        response = self.get_response(request)
        return response
