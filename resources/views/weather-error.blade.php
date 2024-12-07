<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
</head>
<body>
    <div class="container error-container">
        <h1>Oops! Something went wrong.</h1>
        <p>We couldn't fetch the weather data. Please try again later.</p>
        <a href="{{ route('weather.form') }}">
            <button>Go Back</button>
        </a>
    </div>
</body>
</html>
