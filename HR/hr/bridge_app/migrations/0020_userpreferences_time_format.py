# Generated by Django 5.0.1 on 2024-01-29 14:45

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('bridge_app', '0019_remove_userpreferences_projects'),
    ]

    operations = [
        migrations.AddField(
            model_name='userpreferences',
            name='time_format',
            field=models.CharField(choices=[('12 Hour', '12 Hour'), ('24 Hour', '24 Hour')], default='12 Hour', max_length=10),
        ),
    ]
