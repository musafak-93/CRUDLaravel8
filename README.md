<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Dasboard Admin Data Pegawai
Dasboard admin pegawai merupakan dasboard untuk mengelola data pegawai di suatu perusahaan dengan memiliki fitur CRUDS, export pdf, export excel dan import data excel. Dikembangkan menggunakan framework laravel 8 dan template AdminLTE

## Features

- Login
- Register
- Logout
- Dasboard AdminLTE
- Export PDF
- Export Excel
- Import Data Excel
- Middleware/Hak Akses
- Relations Database
- CRUDS data di halaman admin

## System Requirements
- PHP => 7.4.15
- Laravel => 8
- MySQL => 5.7.33
- Laragon
- Visual studio code

## Installation
Install my-project with clone using link HTTP Github

- Clone the repository
  ```bash
  git clone https://github.com/musafak-93/CRUDLaravel8.git
  ```
- Install dependencies using composer install
  ```bash
  composer install
  ```
- Copy the .env.example file to .env
  ```bash
  cp .env.example .env
  ```
- Generate the APP_KEY.
  ```bash
  php artisan key:generate
  ```
- Create database in PhpMyAdmin and update name database in file .env
- Run php artisan migrate to migrate the database
  ```bash
  php artisan migrate
  ```
- Run php artisan serve
  ```bash
  php artisan serve
  ```
    
## Screenshots
- Login
  ![image](https://github.com/musafak-93/CRUDLaravel8/assets/62982123/8521c18c-bbbf-4489-9ea0-d47065402104)
- Register
  ![image](https://github.com/musafak-93/CRUDLaravel8/assets/62982123/cdc52b51-aa43-40f6-999b-267a048f25c7)
- Dasboard Admin
  ![image](https://github.com/musafak-93/CRUDLaravel8/assets/62982123/7120afa8-a561-49ae-8422-42b810a274e5)
- Data Pegawai
  ![image](https://github.com/musafak-93/CRUDLaravel8/assets/62982123/fe32132a-f767-458d-9266-8026dcc841f7)
- Data Religions
  ![image](https://github.com/musafak-93/CRUDLaravel8/assets/62982123/762b7306-5d66-4963-abb6-0b540f778f24)

## Feedback
If you have any feedback, please reach out to us at mus.safak93@gmail.com
