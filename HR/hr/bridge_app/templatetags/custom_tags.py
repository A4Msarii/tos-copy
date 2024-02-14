from django import template
from bridge_app.models import UserPreferences

register = template.Library()

@register.simple_tag
def get_user_preferences(user):
    try:
        return UserPreferences.objects.get(user=user)
    except UserPreferences.DoesNotExist:
        return None
