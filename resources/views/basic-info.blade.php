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
            <h1>Información básica</h1>
        </div>
        <div class="py-4">
            <form method="POST" action="/basic-info">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre completo:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre completo" required>
                </div>
                <div class="form-group">
                    <label for="code">Código estudiantil:</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Ingrese su código estudiantil" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Facultad a la cual pertence:</label>
                    <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Nombre de la facultad" required>
                </div>
                <div class="form-group">
                    <label for="program">Programa al que pertenece:</label>
                    <input type="text" class="form-control" id="program" name="program" placeholder="Nombre del Programa" required>
                </div>
                <button type="submit">Continuar</button>
            </form>
        </div>
    </div>
</body>

</html>
