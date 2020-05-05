# Google Analytics

1. Go to https://console.cloud.google.com and create a new project by saying create a new project.
2. Find the Analytics API and we go into it and say activate.
3. Enter the credentials section.
4. Let's get into Google Analytics now. There is Admin or settings icon on the bottom left, let's click it. Here we need to add the email address we copied in the previous step from the members section. When you enter the settings, click on "User Management" under the view.
5. From here we press the + button in the upper right and say add new user. Enter the email address we copied to the page that opened and add the address.
6. Whichever analytics account you will use, enter "View Settings under view in the settings section and copy your View ID there, you will need it

### Replace the file you created with your.json and view_id
Analytics.class.php inside
```php
private $view_id = 'xxxxxxx';
$client->setAuthConfig(__DIR__ . '/your.json');
```

Demo: [https://www.ufukozdemir.website/github/google-analytics/](https://www.ufukozdemir.website/github/google-analytics/)
