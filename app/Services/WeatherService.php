<?php

namespace App\Services;

use App\Contracts\WeatherServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService implements WeatherServiceInterface
{
    /**
     * Fetch weather data for the given city.
     *
     * @param string $city The city for which to fetch the weather.
     * @return array An associative array containing weather data or an empty array on failure.
     */
    public function fetchWeather(string $city): array
    {
        try {
            // Log the start of the weather-fetch process
            Log::debug('Initiating weather fetch for city: ' . $city);

            // Make the API request with a timeout
            $response = Http::timeout(30)->get("http://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => env('OPENWEATHER_API_KEY'),
                'units' => 'metric',
            ]);

            // Check if the response is successful; log and throw if not
            if ($response->failed() || $response->status() !== 200) {
                $errorDetails = $response->body() ?: 'No response body';
                Log::warning("API request failed for city: $city. Response: $errorDetails");
                throw new Exception("Failed to fetch weather data for city: $city.");
            }

            // Decode the JSON response into an array
            $data = $response->json();

            // Log the successful API response
            Log::info('Weather data fetched successfully for city: ' . $city, $data);

            // Map the relevant fields to a custom format and return
            return [
                'city' => $data['name'], // City name
                'temperature' => $data['main']['temp'] . '°C', // Current temperature
                'feels_like' => $data['main']['feels_like'] . '°C', // Feels like temperature
                'temp_min' => $data['main']['temp_min'] . '°C', // Minimum temperature
                'temp_max' => $data['main']['temp_max'] . '°C', // Maximum temperature
                'description' => ucfirst($data['weather'][0]['description']), // Weather description
                'humidity' => $data['main']['humidity'] . '%', // Humidity percentage
                'wind_speed' => $data['wind']['speed'] . ' m/s', // Wind speed in meters per second
                'date' => now()->toDateTimeString(), // Current date and time
            ];
        } catch (Exception $e) {
            // Log the error details with context
            Log::error("Exception occurred while fetching weather for city: $city. Error: " . $e->getMessage());

            // Return an empty array on failure
            return [];
        }
    }
}
