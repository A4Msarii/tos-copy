# Generated by Django 5.0.1 on 2024-01-29 07:14

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('bridge_app', '0018_user_role'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='userpreferences',
            name='projects',
        ),
    ]