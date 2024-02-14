from django.urls import path
from . import views  # Import the views module

# Add this line at the top of your file to import Django's settings
from django.conf import settings
from django.conf.urls.static import static
from django.contrib.auth import views as auth_views
urlpatterns = [
    path('users/', views.user_list, name='user_list'),
    # path('users1/', views.user_list, name='user_list')
    path('users/<int:user_id>/', views.user_detail, name='user_detail'),
    path('search_users/', views.search_users, name='search_users'),
    path('register/', views.register_user, name='register_user'),
    path('logout/', views.logout_view, name='logout'),
    path('edit-user/<int:user_id>/', views.user_edit, name='user_edit'),
    path('success/', views.success, name='success'),
    path('test-logout/', views.test_logout_view, name='test_logout'),
    path('accounts/login/', auth_views.LoginView.as_view(), name='login'),
    path('mygoals/', views.my_goals_view, name='my_goals_view'),
    path('employee-educational-details/<int:user_id>/', views.employee_educational_details, name='employee_educational_details'),
    path('invalidate_session/', views.invalidate_session, name='invalidate_session'),
    path('custom-logout-page/', views.custom_logout_page, name='custom-logout-page'),
    path('users/settings', views.settings_view, name='settings'),
    path('save_designation_preferences/', views.save_designation_preferences, name='save_designation_preferences'),
    path('update-tshirt-size/', views.update_tshirt_size, name='update_tshirt_size'),
    path('get-roles/', views.get_roles, name='get-roles'),
    path('get_reporting_managers/', views.get_reporting_managers, name='get_reporting_managers'),

]


    
 # Uncomment and ensure logout_view exists in views


if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
