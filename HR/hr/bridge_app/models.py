from django.db import models
from django.contrib.auth.models import User
from django.utils import timezone

# Define your choices for dropdown fields
CULTURAL_AFFILIATION_CHOICES = [
    ('culture1', 'Culture 1'),
    ('culture2', 'Culture 2'),
    # Add more options as needed
]


HOBBIES_CHOICES = [
    ('hobby1', 'Hobby 1'),
    ('hobby2', 'Hobby 2'),
    # Add more options as needed
]

class User(models.Model):
    name = models.CharField(max_length=100)
    nickname = models.CharField(max_length=100, null=True, blank=True)
    id = models.CharField(max_length=50, primary_key=True)
    # supervisor = models.CharField(max_length=100, null=True, blank=True)
    designation = models.CharField(max_length=100, null=True, blank=True, default="")
    projects = models.CharField(max_length=200, null=True, blank=True)
    teamunit = models.CharField(max_length=100, null=True, blank=True)
    phone = models.CharField(max_length=20, null=True, blank=True)
    citycountry = models.CharField(max_length=100, null=True, blank=True)
    email = models.EmailField()
    languages = models.CharField(max_length=100, null=True, blank=True)
    reportingmanager = models.CharField(max_length=100, null=True, blank=True)
    gender = models.CharField(max_length=100, null=True, blank=True)
    doj = models.DateField(max_length=100, null=True, blank=True)
    country = models.CharField(max_length=100, null=True, blank=True)
    file_name = models.CharField(max_length=255, null=True, blank=True)
    role = models.CharField(max_length=100, null=True, blank=True)

    
    class Meta:
        db_table = 'users'

class Employee(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, primary_key=True)
    bday = models.DateField(null=True, blank=True)
    tshirtsize = models.DecimalField(max_digits=5, decimal_places=2, null=True, blank=True, help_text="Enter size in cms")
    mailaddress = models.CharField(max_length=255, null=True, blank=True)
    recentpraises = models.TextField(null=True, blank=True)
    culturalaffiliation = models.CharField(max_length=255, choices=CULTURAL_AFFILIATION_CHOICES, null=True, blank=True)
    # religion = models.CharField(max_length=255, choices=RELIGION_CHOICES, null=True, blank=True)
    hobbies = models.CharField(max_length=255, choices=HOBBIES_CHOICES, null=True, blank=True)
    learninggoals = models.TextField(null=True, blank=True)
    skills_inspiration = models.TextField(null=True, blank=True, db_column='skills&inspiration')
    abouther = models.TextField(null=True, blank=True)
    wordsfromher = models.TextField(null=True, blank=True, max_length=500)  # Added max_length for character limit
    educational_proofs = models.BinaryField(null=True, blank=True)
    Landmark = models.CharField(max_length=255, null=True, blank=True)


    nda_proofs = models.BinaryField(null=True, blank=True)
    government_proofs = models.BinaryField(null=True, blank=True)
    policy_acknowledgment = models.BinaryField(null=True, blank=True)
    offer_promotions = models.BinaryField(null=True, blank=True)
    probation_duration = models.DateField(null=True, blank=True)
    entry_salary = models.DecimalField(max_digits=10, decimal_places=2, null=True, blank=True)
    joining_date = models.DateField(null=True, blank=True)
    first_hike = models.CharField(max_length=100, null=True, blank=True)
    hike_percentage = models.DecimalField(max_digits=5, decimal_places=2, null=True, blank=True)
    hike_date = models.DateField(null=True, blank=True)
    custom_hobby = models.CharField(max_length=255, null=True, blank=True)

    def save(self, *args, **kwargs):
        # If a custom hobby is provided, set the "hobbies" field to "other"
        if self.custom_hobby:
            self.hobbies = 'other'
        super(Employee, self).save(*args, **kwargs)

    def __str__(self):
        return self.user.name

    class Meta:
        db_table = 'employee'

class BlacklistedToken(models.Model):
    token = models.CharField(max_length=100, unique=True)
    timestamp = models.DateTimeField(default=timezone.now)

    def __str__(self):
        return self.token


class UserPreferences(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    display_name = models.BooleanField(default=True)
    display_designation = models.BooleanField(default=True)
    display_projects = models.BooleanField(default=True)
    display_phone = models.BooleanField(default=True)
    display_email = models.BooleanField(default=True)
    display_team = models.BooleanField(default=True)
    display_citycountry = models.BooleanField(default=True)
    display_reporting_manager = models.BooleanField(default=True)
    time_format = models.CharField(
        max_length=10,  # Adjust the max length as needed
        choices=[('12 Hour', '12 Hour'), ('24 Hour', '24 Hour')],
        default='12 Hour'  # Set the default time format as needed
    )
    time_zone = models.CharField(
        max_length=20,  # Adjust the max length as needed
        choices=[
            ('India', 'India'),
            ('Chennai', 'Chennai'),
            # Add other time zones as needed
        ],
        default='India'  # Set the default time zone as needed
    )
    # projects = models.CharField(max_length=200, null=True, blank=True)