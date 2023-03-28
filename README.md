# Coronatime
> This is application which provides the latest statistics of Covid-19 spread, recovery and lethality rate. User is able to register/login, reset password, search by country, filter or order them in table.


## Table of Contents
* [General Info](#general-information)
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Development](#development)
* [Features](#features)
* [DrawSQL](#drawSQL)
* [Project Status](#project-status)
* [Room for Improvement](#room-for-improvement)
* [Acknowledgements](#acknowledgements)
* [Contact](#contact)


## General Information
- My second project written in Laravel. This application generates the latest statistics of Covid-19 over the world, or particular country. In order to sort, filter or search concrete information users have to register/login. Application requires email verification after register and gives opportunity to reset password if you forgot the old one. Information is fetched from API and saved locally in database, after it is displayed in blades.


## Prerequisites
- PHP v8 and up
- MySQL v8.0.3 and up
- Composer - v2.4.0 and up
- Node - v14.20.0 and up
- npm@6 and up


## Tech Stack
Used dependencies : 
- Laravel - version 9.26.1
- Tailwind CSS - version 3.0
- Alpine.js
- Spatie Translatable
- Laravel Livewire

Installation : 
- Alpine.js - https://alpinejs.dev/essentials/installation
- Spatie Translatable - https://spatie.be/docs/laravel-translatable/v6/installation-setup
- Tailwind Css - https://tailwindcss.com/docs/installation
- Livewire - https://laravel-livewire.com/docs/2.x/installation


## Getting Started
1) First of all, clone Coronatime repository from Github:

    `https://github.com/RedberryInternship/temo-gogitidze-corona-time.git`

2) Install all the dependencies : 

    `composer install`

3) Install all the JS dependencies :

    `npm install`

4) Build JS/Tailwind resources : 

    `npm run dev`

5) Install Laravel Livewire: 

    `composer require livewire/livewire`

6) Set our env file. Run this command to the root of your project :

    `cp .env.example .env`

7) Generate key : 

    `php artisan key:generate`

8) Migration : 

    `php artisan migrate`

9) Run Laravel's built-in development server: 

    `php artisan serve`


## Development
`npm run dev` - Use this command in terminal while working on this project (tailwind).

`php artisan fetch:statistics` - Use this command in order to fetch data from API.


## Features
List the ready features here:
- Register/Login user.
- Verification emails.
- Reset password.
- Sort/filter countries by name/numbers.
- Remember me function.
- Supported with 2 languages (EN, KA).


## DrawSQL
- DrawSQL Link : https://drawsql.app/teams/team-seven/diagrams/coronatime

## Project Status
Project is: complete


## Room for Improvement
Room for improvement:
- Loading spinners
- Display flags


## Acknowledgements
- This project was inspired by RedBerry.
- Project design : https://www.figma.com/file/O9A950iYrHgZHtBuCtNSY8/Coronatime?node-id=0%3A1.


## Contact
Created by Temo Gogitidze - +995(591 94 32 99)

