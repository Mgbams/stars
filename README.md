<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# StarsApp

A simple application created with laravel and javascript.

## Table of Contents

-   [General info](#general-info)
-   [Technologies](#technologies)
-   [Requirements](#requirements)
-   [Features](#features)
-   [Setup](#setup)
-   [Site](#site)

## General info

This project is a skill test project that displays a celebrities information in different formats depending on the screen sizes. It also allows an administrator to manage the information displayed on the screen through the dashboard.

## Technologies

This project was created with:

-   Laravel
-   Javascript
-   Html5
-   CSS3

## Requirements

-   Node Js
-   Composer
-   Code editeur e.g VS code
-   A database e.g MySQL

## Features

-   Edit, Delete, Update and Create a celebrity profile from the dashboard
-   Edit, Delete, Update and Create a user profile from the dashboard
-   Routing users based on user roles

## Setup

To run this project, install it locally as follows

-   Download the Zip file to your computer or Open it with Github Desktop
-   if you downloaded the zipped file, unzip the file using applications like winrar, 7-zip e.tc
-   Create a MySQL database called **star_lists** or with a name of your choice.
    The interclassement should be **utf8_general_ci**.

*   Import the file called star_lists.sql that is located in the unzipped file into the database you just created.
    **NOTE**: The character set for the file during import should be **utf8**.

-   Open the folder after unzipping it in your code editor of choice e.g VSCode, PHPStorm e.t.c
-   Open a terminal to install the php dependencies using the command

```bash
$ composer install
```

-   Also install the javascript dependencies using the command

```bash
$ npm install
```

-   Create a **.env** file at the root of your application.

-   Copy the contents of **.env.example** to **.env**

-   Open the **.env** file and add the name of the database you created. In the configuration of the mysql database, we add star_lists to the DB_DATABASE =
    i.e. **DB_DATABASE=star_lists**

-   Generate a key with

```bash
$ php artisan key:generate
```

-   Launch the application with

```bash
$ php artisan serve
```

## users for test running the app

-   Admin:

    -   email: admin@admin.com
    -   password: password

-   User
    -   email: king@gmail.com
    -   password: testpassword

## Site

### Stars Lists on Large Screen

<img src="./application_captures/stars_lists_large_screen.png" alt="stars lists in dashboard" width="600" height="250"/>

### Delete a role

<img src="./application_captures/deleting_role.png" alt="stars lists in dashboard" width="400" height="200"/>

### Landing Page Large Screen

<img src="./application_captures/landing_page_big_screen.png" alt="stars lists in dashboard" width="400" height="250"/>

### Landing Page Small Screen

<img src="./application_captures/landing_page_small_screen.png" alt="stars lists in dashboard" width="250" height="200"/>

## Sources

This application was inspired by a skill test for a job application in Laravel with HelloCSE.

## Packages

-   [html purifier](https://github.com/mewebstudio/Purifier)
-   [tinyMCE](https://www.tiny.cloud/)
-   [AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
