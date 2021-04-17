## About Project

Created User Registration Module with Laravel Version 5.7 using following fields:

- Name
- Email
- Phone
- Street Address (While typing, it should auto-suggest the address using smarty street  API.)
- City
- State
- Zip
- password

## Following things are considered in this module

1) While typing, it should auto-suggest the address using smarty street API
2) Send a welcome email to user email id (use Laravel Events)
3) Using smarty street API Find the county name of that address
4) Save the county name into the user table
5) Laravel version 5.7 used

## How to Setup
1) Clone this project module by -> git clone https://github.com/vinodkate/RegModule.git
2) Navigate to RegModule directory from commnad prompt / git bash
3) Create MySQL Database by name reg_module
4) Copy .env.example to .env file
5) Change following database env variables in .env file

	DB_CONNECTION=mysql<br>
	DB_HOST=127.0.0.1<br>
	DB_PORT=3306<br>
	DB_DATABASE=reg_module<br>
	DB_USERNAME=<db_username><br>
	DB_PASSWORD=<db_password><br> 

6) Change following email configuration variables in .env file 

	MAIL_DRIVER=smtp<br>
	MAIL_HOST=smtp.mailtrap.io<br>
	MAIL_PORT=2525<br>
	MAIL_USERNAME=<mailtrap_username><br>
	MAIL_PASSWORD=<mailtrap_password><br>
	MAIL_ENCRYPTION=null<br>

7) Change following smartystreet auth keys
	
	SMARTYSTREET_AUTH_ID=<auth_id><br>
	SMARTYSTREET_AUTH_TOKEN=<auth_token><br>
	SMARTYSTREET_CLIENT_KEY=<key><br>

8) Run composer install command -> composer install
9) Run php artisan migration command -> php artisan migrate
10) Run project by -> php artisan serv

## Project Images
- Street Address auto-suggest
<p align="center"><img src="https://github.com/vinodkate/RegModule/blob/master/public/images/RegForm1.png?raw=true"></p>

- Registration Form
<p align="center"><img src="https://github.com/vinodkate/RegModule/blob/master/public/images/RegForm2.png?raw=true"></p>

- Welcome Email
<p align="center"><img src="https://github.com/vinodkate/RegModule/blob/master/public/images/welcome.png?raw=true"></p>

