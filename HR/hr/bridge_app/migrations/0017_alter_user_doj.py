# Generated by Django 5.0.1 on 2024-01-18 01:51

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('bridge_app', '0016_alter_user_doj'),
    ]

    operations = [
        migrations.AlterField(
            model_name='user',
            name='doj',
            field=models.DateField(blank=True, max_length=100, null=True),
        ),
    ]