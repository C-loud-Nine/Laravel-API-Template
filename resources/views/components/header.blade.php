<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <header>
        <div class="navbar">
            <h1>Welcome to Our Website</h1>
            <nav>
                <a href="{{ route('register') }}">Register</a> |
                <a href="{{ route('login') }}">Login</a>
            </nav>
        </div>
    </header>
