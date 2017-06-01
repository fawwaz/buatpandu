## PanduCourse

This repo is a dedicated repo for Pandu Kartika Putra.

### Getting started
* clone current repo
```
git clone https://github.com/fawwaz/buatpandu.git
```
* install required libraries
```
cd buatpandu
composer install
```
* Configure your .env to match your database configurations (e.g username or password). You need to note the APP_KEY value. Ask fawwaz directly what is the value of it. This .env file shouldn't be committed to any git repository since it is very confidential (contains mysql password, your app_key).
* Run the `migrations`, in a nutshell, it is a script that configure your DB so you always have the same copy of your workspace.
```
php artisan migrate
```
* Run simple HTTP server in `/public` directory,
```
cd public
php -S localhost:8000
```
* open your browser, navigate to `localhost:8000`, voila.

### Basic concept, Terms in laravel and Naive Glossary
* Artisan : a code generator for laravel. you can access all the artisan command by using : `php artisan list`
* Migration : Database definition written in PHP
* Seeder : Initial data, usually faked just to fill empty placeholder in your app.
* Eloquent : Magic class that almost fulfill your database access requirements. Unless you are making a complex queries. It can be viewed as `Model` in `MVC` architectural patterns.
* Controller : your application logic. It is your `Controller` in `MVC` architectural patterns,
* Views : the files that are shown in browser. Off course, it is your `Views` in `MVC` architectural patterns.
