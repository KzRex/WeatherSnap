# Weather Application - Documentation

## Overview
The **Weather Application** is a Laravel-based project that allows users to retrieve real-time weather data for any city using the OpenWeather API. It demonstrates clean code practices, error handling, and the use of a service interface.

---

## Features
- Fetches real-time weather data including:
  - Temperature
  - Feels Like Temperature
  - Minimum and Maximum Temperatures
  - Humidity
  - Weather Description
  - Wind Speed
- Simple and user-friendly interface.
- Custom error handling with a dedicated error page.

---

## Prerequisites
Ensure the following are installed on your system:
- PHP (>= 7.2.5)
- Composer
- Laravel Framework
- OpenWeather API Key (Sign up at [OpenWeather](https://openweathermap.org/) to get a free API key)

---

## Installation Guide

### 1. Clone the Repository
```bash
git clone <repository_url>
cd <repository_folder>
```

### 2. Install Dependencies
```bash
cd weather-app
composer install
```

### 3. Set up Environment Variables
The application requires an API key for the OpenWeather API. You'll need to register on OpenWeather and get your own API key.

- Create a .env file in the root directory of the project (if not already present) by copying from the .env.example:
```bash
cp .env.example .env
```

- Open the .env file and add this OpenWeather API key:
```bash
OPENWEATHER_API_KEY=22a94d325e94c6ead62cbc487fcc9bc9
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run the Application
```bash
php artisan serve
```

## Application Flow
- **User Input**: The user visits the weather form page, enters a city name, and submits the form.
- **Weather Fetching**: The application sends a request to the OpenWeather API, retrieves the weather data, and formats it.
- **Weather Display**: The user is redirected to a new page displaying the current weather data of the city entered.
- **Error Handling**: If the weather data cannot be fetched or any error occurs during the process, the user is redirected to a custom error page.

## Architecture
- **WeatherController**: Manages incoming requests and generates appropriate responses.
- **WeatherService**: Handles the logic to fetch weather data from the OpenWeather API.
- **WeatherServiceInterface**: Defines the contract that the `WeatherService` class must follow.
- **Views**: The user interface component responsible for gathering input and displaying results.

## Directory Structure

```bash
app/
├── Contracts/
│   └── WeatherServiceInterface.php
├── Http/
│   └── Controllers/
│       └── WeatherController.php
├── Services/
│   └── WeatherService.php
resources/
├── views/
│   ├── weather-form.blade.php
│   ├── weather-display.blade.php
│   └── weather-error.blade.php
```

## Error Handling
If an error occurs during the weather-fetching process, the user will be redirected to a custom error page (weather-error). The error page provides feedback to the user and suggests retrying.

## Additional Notes
- Make sure the OpenWeather API key is valid and correctly set in your .env file.
- The application uses Laravel's built-in validation to ensure the city name is properly entered.
- The app has a clean, minimalist black-and-white UI theme.

