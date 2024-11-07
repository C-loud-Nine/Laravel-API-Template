<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image for Prediction</title>
</head>
<body>
    <h1>Upload Image for Prediction</h1>
    @if($errors->any())
        <div>
            <strong>Error:</strong> {{ $errors->first() }}
        </div>
    @endif

    <form action="/predict" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Predict</button>
    </form>
</body>
</html>
