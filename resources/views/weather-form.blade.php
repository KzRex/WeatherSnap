<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Form</title>
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
</head>
<body>
    <div class="container">
        <h1>Enter City Name to Get Weather</h1>
        <form action="{{ route('weather.fetch') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="city">City Name:</label>
                <input type="text" id="city" name="city" required placeholder="Enter city name">
            </div>
            <div class="form-group">
                <button type="submit">Get Weather</button>
            </div>
        </form>
    </div>
</body>
</html>
