<?php

namespace App\Http\Controllers;

use App\Contracts\WeatherServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller {

    /**
     * Inject WeatherServiceInterface using constructor dependency injection.
     */
    public function __construct(
        private readonly WeatherServiceInterface $weatherService
    ) {}

    /**
     * Display the form for the user to input the city name.
     *
     * @return View
     */
    public function showForm(): View
    {
        // Log the action of showing the form
        Log::info('Rendering the weather form view.');
        return view('weather-form');
    }

    /**
     * Fetch weather data for the given city and display the results.
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function fetchWeather(Request $request): View|RedirectResponse
    {
        try {
            // Validate the incoming request for 'city' input
            Log::info('Validating request for city input.');
            $request->validate(['city' => 'required|string|max:255']);

            // Fetch weather data from the service
            $city = $request->input('city');
            Log::info("Fetching weather data for city: $city");
            $weatherData = $this->weatherService->fetchWeather($city);

            // Check if weather data is empty or invalid
            if (empty($weatherData)) {
                Log::warning("Weather data could not be retrieved for city: $city");
                throw new Exception("Failed to fetch weather data");
            }

            // Log success and return the view with weather data
            Log::info("Weather data successfully fetched for city: $city", $weatherData);
            return view('weather-display', compact('weatherData'));

        } catch (Exception $e) {
            // Log the error details
            Log::error('Error in WeatherController::fetchWeather - ' . $e->getMessage());

            // Redirect to a custom error page
            return redirect()->route('weather.error');
        }
    }

    /**
     * Display the custom error page for any issues during the process.
     *
     * @return View
     */
    public function showError(): View
    {
        // Log the action of showing the error page
        Log::info('Rendering the weather error page.');
        return view('weather-error');
    }
}
