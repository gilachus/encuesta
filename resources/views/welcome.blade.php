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
        <div class="py-4 px-6">
            <h1>Celebraciòn dìa del Maestro</h1>
            <h2>Encuesta para conocer y premiar al mejor profesor de nuestra alma mater</h2>
        </div>
        <div class="py-4">
            <form method="POST" action="/checkemail">
                <img src="{{ asset('img/udec.png') }}" alt="">
                @csrf
                <div class="form-group">
                    <label for="student_email">Correo institucional:</label>
                    <input type="email" id="student_email" name="student_email" placeholder="Ingrese su correo institucional" required>
                </div>
                <button type="submit">Continuar</button>
            </form>
        </div>
    </div>
</body>
</html>
