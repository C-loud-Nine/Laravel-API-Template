<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Result</title>
</head>
<body>
    <h1>Prediction Result</h1>

    <!-- Display the uploaded image -->
    <div>
        <h2>Uploaded Image:</h2>
        <img src="{{ $imageUrl }}" alt="Uploaded Image" style="max-width: 400px; height: auto;">
    </div>

    <!-- Display prediction result -->
    <p><strong>Class:</strong> {{ $result['class'] }}</p>
    <p><strong>Confidence:</strong> {{ $result['confidence'] * 100 }}%</p>

    <a href="/upload">Upload Another Image</a>
</body>
</html>
