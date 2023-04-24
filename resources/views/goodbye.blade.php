<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Styles -->
    <style>

    </style>
</head>

<body class="antialiased">
    @if(session()->has('mensaje'))
    <div class="alert alert-danger">
        {{ session('mensaje') }}
    </div>
    @endif
    <div class="welcome min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="py-4">
            <img src="{{ asset('img/udec.png') }}" alt="">
        </div>
        <div class="py-4 px-6">
            <h1>¡Gracias por participar!</h1>
        </div>
    </div>
</body>

</html>
