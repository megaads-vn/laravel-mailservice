# Laravel MailService Module
## Installation & Configuration
``` 
composer require megaads/laravel-mailservice
```

After require module success, register module on config app.
```
Megaads\Laravelmailservice\LaravelmailserviceServiceProvider::class
```
If using lumen, register class module on ``` bootstrap/app.php ```. Then add some param config to env file
```
EMAIL_SERVICE_URL=
EMAIL_SERVICE_USER=
EMAIL_SERVICE_PASSWORD=
```
### Using
On constructor function, declare email service.
```
$this->emailService = $this->app->make('sendEmailService');
```

Create send options email like below
```
$options = [
    'to' => 'email1, email2, email3' // if not service using group param
    'group' => 'technical', // if not service using to params
    'content' => 'Hello World', // text string or laravel view html render
    'subject' => 'Send test email',
    'name' => 'Joe Smith',
]
```
Finally call service to send email and waiting for result. 
```
$this->emailService->sendMail($options);
```