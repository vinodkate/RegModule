<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project

Created User Registration Module with following fields:

- Name
- Email
- Phone
- Street Address (While typing, it should auto-suggest the address using smarty street  API.)
- City
- State
- Zip

## Following things are considered in this module

1) While typing, it should auto-suggest the address using smarty street  API (US Autocomplete Pro API used)
2) Send a welcome email to user email id (use Laravel Events)
3) Using smarty street API Find the county name of that address (US ZIP Code API used)
4) Save the county name into the user table
5) Laravel version 5.7 used

## How to Setup
1) Clone this project module by -> git clone https://github.com/vinodkate/RegModule.git
2) Navigate to RegModule directory from commnad prompt / git bash
3) Create MySQL Database by name reg_module
3) Change following database env variables in .env file

	DB_CONNECTION=mysql<br>
	DB_HOST=127.0.0.1<br>
	DB_PORT=3306<br>
	DB_DATABASE=<db_name><br>
	DB_USERNAME=<db_username><br>
	DB_PASSWORD=<db_password><br> 

4) Change following email configuration variables in .env file

	<br>MAIL_DRIVER=smtp<br>
	MAIL_HOST=smtp.mailtrap.io<br>
	MAIL_PORT=2525<br>
	MAIL_USERNAME=<mailtrap_username><br>
	MAIL_PASSWORD=<mailtrap_password><br>
	MAIL_ENCRYPTION=null<br>
4) Run composer install command -> composer install
6) Run php artisan migration command -> php artisan migrate
7) Run project by - php artisan serv
8) Thank you!

## Project Images
- Street Address auto-suggest
<p align="center"><img src="https://github.com/vinodkate/RegModule/blob/master/public/images/RegForm1.png?raw=true"></p>
- Registration Form
<p align="center"><img src="https://github.com/vinodkate/RegModule/blob/master/public/images/RegForm2.png?raw=true"></p>

