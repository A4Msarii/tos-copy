# decorators.py

from django.core.exceptions import PermissionDenied
from functools import wraps
from django.http import HttpResponseForbidden

# def prevent_access_after_logout(view_func):
#     @wraps(view_func)
#     def _wrapped_view(request, *args, **kwargs):
#         # Check if the "user_logged_out" flag is set in the session
#         user_logged_out = request.session.get('user_logged_out', False)

#         # List of URLs to protect even after logout
#         protected_urls = ['/users/', '/restricted-url2/']  # Add your URLs here

#         if user_logged_out and request.path_info in protected_urls:
#             # User has logged out and is trying to access a protected URL
#             return HttpResponseForbidden("Access denied after logout")

#         return view_func(request, *args, **kwargs)

#     return _wrapped_view


