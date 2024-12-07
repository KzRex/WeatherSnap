<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', [WeatherController::class, 'showForm'])->name('weather.form');
Route::post('/weather', [WeatherController::class, 'fetchWeather'])->name('weather.fetch');
Route::get('/weather/error', [WeatherController::class, 'showError'])->name('weather.error');
