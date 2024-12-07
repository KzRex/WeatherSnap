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
        <!-- <form action="{{ route('weather.fetch') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="city">City Name:</label>
                <input type="text" id="city" name="city" required placeholder="Enter city name">
            </div>
            <div class="form-group">
                <button type="submit">Get Weather</button>
            </div>
        </form> -->

        <form id="weatherForm" action="{{ route('weather.fetch') }}" method="POST">
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

    <!-- JavaScript validation script -->
    <script>
        document.getElementById('weatherForm').addEventListener('submit', function(event) {
            var city = document.getElementById('city').value;

            // Regex to allow only letters and spaces for the city name
            var cityPattern = /^[a-zA-Z\s]+$/;

            // If city doesn't match the pattern, prevent form submission and show an alert
            if (!cityPattern.test(city)) {
                event.preventDefault(); // Prevent form submission
                alert('Invalid City Name. Please enter a valid city name with only letters and spaces.');
            }
        });
    </script>
</body>
</html>
