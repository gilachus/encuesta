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
    <div class="welcome  min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="py-4 px-6">
            <h1>Selecciona a tu profe según la categoría </h1>
        </div>
        <div class="min-w">
            <form method="POST" action="/survey">
                @csrf
                <div class="form-group">
                    <label for="funniest_professor_id">El profesor más divertido:</label>
                    <p>Ese es mi Profe</p>
                    <input type="text" class="form-control" id="buscar1" name="buscar1" placeholder="Escribe al menos tres letras para buscar">
                    <select id="funniest_professor_id" name="funniest_professor_id" required></select>
                </div>
                <div class="form-group">
                    <label for="most_demading_professor_id">El profesor más exigente:</label>
                    <p>Ese es mi Profe</p>
                    <input type="text" class="form-control" id="buscar2" name="buscar2" placeholder="Escribe al menos tres letras para buscar">
                    <select id="most_demading_professor_id" name="most_demading_professor_id" required></select>
                </div>
                <div class="form-group">
                    <label for="most_inspiring_professor_id">El profesor más inspirador:</label>
                    <p>Ese es mi Profe</p>
                    <input type="text" class="form-control" id="buscar3" name="buscar3" placeholder="Escribe al menos tres letras para buscarscar">
                    <select id="most_inspiring_professor_id" name="most_inspiring_professor_id" required></select>
                </div>
                <div class="form-group">
                    <label for="most_supportive_professor_id">El profesor más solidario:</label>
                    <p>Ese es mi Profe</p>
                    <input type="text" class="form-control" id="buscar4" name="buscar4" placeholder="Escribe al menos tres letras para buscar">
                    <select id="most_supportive_professor_id" name="most_supportive_professor_id" required></select>
                </div>
                <div class="form-group">
                    <label for="most_innovative_professor_id">El profesor más innovador:</label>
                    <p>Ese es mi Profe</p>
                    <input type="text" class="form-control" id="buscar5" name="buscar5" placeholder="Escribe al menos tres letras para buscar">
                    <select id="most_innovative_professor_id" name="most_innovative_professor_id" required></select>
                </div>
                <button type="submit">Finalizar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        let professors = []
        function fill(e, tofill) {
            if (e.target.value.length >= 3) {
                const filter = e.target.value.toLowerCase();
                let select = document.getElementById(tofill);
                cleanselect(select)
                professorsfiltered = professors.filter(professor => professor.name.toLowerCase().includes(filter))
                if(professorsfiltered.length > 0) {
                    professorsfiltered.forEach(function(professor) {
                        let option = document.createElement('option');
                        option.value = professor.id;
                        option.text = professor.name;
                        select.add(option);
                    });
                } else {
                    let option = document.createElement('option');
                    option.value = 0;
                    option.text = 'no hay resultados';
                    option.setAttribute('disabled', '');
                    select.add(option);
                }
            }
        }
        window.onload = function() {
            $.ajax({
                url: '/professors',
                success: function(data) {
                    professors = data.professors
                }
            });
            const buscar1 = document.getElementById('buscar1');
            const buscar2 = document.getElementById('buscar2');
            const buscar3 = document.getElementById('buscar3');
            const buscar4 = document.getElementById('buscar4');
            const buscar5 = document.getElementById('buscar5');
            buscar1.addEventListener('input', e => {
                fill(e, 'funniest_professor_id')
            })
            buscar2.addEventListener('input', e => {
                fill(e, 'most_demading_professor_id')
            })
            buscar3.addEventListener('input', e => {
                fill(e, 'most_inspiring_professor_id')
            })
            buscar4.addEventListener('input', e => {
                fill(e, 'most_supportive_professor_id')
            })
            buscar5.addEventListener('input', e => {
                fill(e, 'most_innovative_professor_id')
            })
        };
        function cleanselect(select){
            for (let i = select.options.length; i >= 0; i--) {
                select.remove(i);
            }
        }
    </script>
</body>
</html>
