<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
</head>
<body>
    <div class="container">
        <div class="weather-info-container">
            <h1 class="city-title">Weather in {{ $weatherData['city'] }}</h1>
            <div class="weather-details">
                <div class="weather-item">
                    <strong>Temperature:</strong>
                    <span>{{ $weatherData['temperature'] }}</span>
                </div>
                <div class="weather-item">
                    <strong>Feels Like:</strong>
                    <span>{{ $weatherData['feels_like'] }}</span>
                </div>
                <div class="weather-item">
                    <strong>Min Temperature:</strong>
                    <span>{{ $weatherData['temp_min'] }}</span>
                </div>
                <div class="weather-item">
                    <strong>Max Temperature:</strong>
                    <span>{{ $weatherData['temp_max'] }}</span>
                </div>
                <div class="weather-item">
                    <strong>Description:</strong>
                    <span>{{ $weatherData['description'] }}</span>
                </div>
                <div class="weather-item">
                    <strong>Humidity:</strong>
                    <span>{{ $weatherData['humidity'] }}%</span>
                </div>
                <div class="weather-item">
                    <strong>Wind Speed:</strong>
                    <span>{{ $weatherData['wind_speed'] }} km/h</span>
                </div>
                <div class="weather-item">
                    <strong>Date & Time:</strong>
                    <span>{{ $weatherData['date'] }}</span>
                </div>
            </div>
            <div class="back-button-container">
                <button class="back-button" onclick="window.location.href='{{ route('weather.form') }}'">Back to Form</button>
            </div>
        </div>
    </div>
</body>
</html>
