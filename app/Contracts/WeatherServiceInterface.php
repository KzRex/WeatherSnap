<?php

namespace App\Contracts;

interface WeatherServiceInterface
{
    public function fetchWeather(string $city): array;
}