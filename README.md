<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to run the project After Cloning Project
1. Run `composer install` to generate depedencies
2. Create `.env` file in the root of the project
3. Copy all the data from `.env.example` to `.env`. 
4. Run `php artisan key:generate`
5. Activate XAMPP, Start Aache & MySQL service. 
6. Create the DB and configure the `.env`
7. Run `php artisan migrate:fresh --seed`
8. Run `php artisan storage:link`
9. Run the web using `php artisan serve`

Account for Admin :

Email : admin@admin.com

Password : 12345678


Account for Customer :

Email : chris@gmail.com

Password : 12345678

## Created By
2301870350 - Chrismorgan Shintaro

Note : This auction website is a development of my final project from a web programming laboratory class. So it will have a little resemblance, but overall there are quite big differences.

Source : https://stackoverflow.com/questions/38437072/setup-laravel-project-after-cloning
