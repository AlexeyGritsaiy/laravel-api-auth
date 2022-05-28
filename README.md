<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel
1. cp .env.example .env
2. docker-compose up --build -d
3. docker-compose exec php-cli bash
4. composer install

## DB connect Mysql
database - app
port     - 33061
user     - app
password - secret

1. php artisan migrate

## Postman
1. method POST http://localhost:8080/api/register

2. set params to body Postman
3. name - {{$randomUserName}}
4. email - {{$randomExampleEmail}}
5. password - 123456 

## Open mailHog from test Mail 
1. http://localhost:8025/

## Login
1.method POST link in mail

