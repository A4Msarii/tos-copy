# Generated by Django 5.0.1 on 2024-01-12 01:53

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('bridge_app', '0005_userpreferences_display_email_and_more'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='userpreferences',
            name='display_team',
        ),
    ]