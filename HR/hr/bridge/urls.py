from django.contrib import admin
from django.urls import path
from django.contrib.auth import views as auth_views
from bridge_app.views import user_list, user_detail, register_user, logout_view, user_edit, success, test_logout_view,my_goals_view, employee_educational_details, custom_logout_page, settings_view, save_designation_preferences, update_tshirt_size, search_users, get_roles, get_reporting_managers
urlpatterns = [
    path('admin/', admin.site.urls),
    path('users/', user_list, name='user_list'),
    # path('users1/', user_list, name='user_list'),
    path('users/<int:user_id>/', user_detail, name='user_detail'),
    path('register/', register_user, name='register_user'),
    path('logout/', logout_view, name='logout'),
    path('edit-user/<int:user_id>/', user_edit, name='user_edit'),
    path('success/', success, name='success'),
    path('test-logout/', test_logout_view, name='test_logout'),
    path('accounts/login/', auth_views.LoginView.as_view(), name='login'),
    path('employee-educational-details/<int:user_id>/', employee_educational_details, name='employee_educational_details'),
    path('users/settings/', settings_view, name='settings_view'),
    path('custom-logout-page/', custom_logout_page, name='custom_logout_page'),  # Add this URL pattern
    path('save_designation_preferences/', save_designation_preferences, name='save_designation_preferences'),
    path('update-tshirt-size/', update_tshirt_size, name='update_tshirt_size'),
    path('search_users/', search_users, name='search_users'),
    path('get-roles/', get_roles, name='get-roles'),
    path('get_reporting_managers/', get_reporting_managers, name='get_report_managers'),  # Add the URL pattern for fetching report managers


    # Define a new URL pattern for "mygoals.html"
    path('mygoals/', my_goals_view, name='my_goals_view'),  # Replace with your view name
]
