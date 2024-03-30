# This project is a Laravel 9 application with a Vue 3 frontend for parsing and searching for places in Nitra region.

## Prerequisites

* PHP >= 8.0
* Composer
* Node.js and npm (or yarn)

## Installation

1. **Clone the repository:**

```bash
git clone https://github.com/MykytaKot/ui42_Assignment.git
```
2. **Install Laravel dependencies:**
```bash
cd 'project-root'
composer install
```
3. **Generate application key:**
```bash
php artisan key:generate
```
4. **Setup configuration:** <br />
* Copy .env.example to .env and update the database credentials according to your environment.
* Register at [positionstack](https://positionstack.com/) geocoding website and put your api key to POSITIONSTACK_API_KEY variable in .env
5. **Migrate database:**
```bash
php artisan migrate
```
6. **Install Vue.js dependencies:**
```bash
cd 'project-root'
npm install
```
7. **Build Vue.js assets:**
```bash
npm run dev  #(for development mode)
npm run build  #(for production mode)
```
## Usage

1. **Import and geocode cities from nitra**
```bash
php artisan data:import
php artisan data:geocode
```
2. **Start server**
```bash
php artisan serve
```
<br />
The application should be accessible in your browser at http://localhost:8000 by default.


## Website controls 
<br />
Start typing in a text field with placeholder "Zadajte nazov ..." and after typing 2nd letter it will show first 10 cities where its name contains your input , then click on a city name to go to city details and see it position on map 

## Features

1. Mobile optimised design
2. No need to clear cache to change sass styles
3. leaflet map
4. full inforamtion about cities
5. design is exactly how on assigment pictures (exept map and more details on detailed page)
