## About

The project generate tiny url for url, main goal here is play to PHP + LARAVEL after long time without do nothing with both tecnologies.

## Technologies

- PHP 8.0
- Laravel 9
- Sqlite

## Instructions to run locally

- Clone.
- Create **.env** file based ".env.example" file
- Set follow envs in **.env** file:
```
    BASE_LINK_TINY_URL=<http://localhost:8000/links/>
    CACHE_DRIVER=file
    DB_CONNECTION=sqlite
```
- Execute command **touch database/database.sqlite** 
- Execute command **php artisan migrate** to run migrations.
- Execute command **php artisan optimize** to cache routes and configs.
- Execute command **php artisan serve** to start the laravel application.
- Execute command **php artisan octane:start** to start the laravel application using octane.