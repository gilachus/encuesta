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
                    <label for="student_name">Nombre completo:</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Ingrese su nombre completo" required>
                </div>
                <div class="form-group">
                    <label for="student_code">Código estudiantil:</label>
                    <input type="text" class="form-control" id="student_code" name="student_code" placeholder="Ingrese su código estudiantil" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Facultad a la cual pertence:</label>
                    <!-- <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Nombre de la facultad" required> -->
                    <select id="faculty" name="faculty" required><option value="" disabled selected hidden>seleccione su facultad</option></select>
                </div>
                <div class="form-group">
                    <label for="program">Programa al que pertenece:</label>
                    <!-- <input type="text" class="form-control" id="program" name="program" placeholder="Nombre del Programa" required> -->
                    <select id="program" name="program" required><option value="" disabled selected hidden>seleccione su programa</option></select>
                </div>
                <button type="submit">Continuar</button>
            </form>
        </div>
    </div>
    <script>
        const PROGRAMS = [{
                "PROGRAMA": "ADMINISTRACIÓN DE EMPRESAS (DISTANCIA)",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN DE EMPRESAS (PRESENCIAL)",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN DE EMPRESAS TURÍSTICAS Y HOTELERAS",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN FINANCIERA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN INDUSTRIAL",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN PÚBLICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "CONTADURÍA PÚBLICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "ECONOMÍA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "TÉCNICA PROFESIONAL EN PROCESOS DE GESTIÓN PÚBLICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "TÉCNICO PROFESIONAL EN OPERACIÓN TURÍSTICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "TECNOLOGÍA EN GESTIÓN PÚBLICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "TECNOLOGÍA EN GESTIÓN TURÍSTICA",
                "FACULTAD": "CIENCIAS ECONÓMICAS"
            },
            {
                "PROGRAMA": "BIOLOGÍA",
                "FACULTAD": "CIENCIAS EXACTAS Y NATURALES"
            },
            {
                "PROGRAMA": "MATEMÁTICAS",
                "FACULTAD": "CIENCIAS EXACTAS Y NATURALES"
            },
            {
                "PROGRAMA": "QUÍMICA",
                "FACULTAD": "CIENCIAS EXACTAS Y NATURALES"
            },
            {
                "PROGRAMA": "TÉCNICA PROFESIONAL EN PROCESOS METROLÓGICOS",
                "FACULTAD": "CIENCIAS EXACTAS Y NATURALES"
            },
            {
                "PROGRAMA": "TECNOLOGÍA EN METROLOGÍA INDUSTRIAL",
                "FACULTAD": "CIENCIAS EXACTAS Y NATURALES"
            },
            {
                "PROGRAMA": "QUÍMICA FARMACÉUTICA",
                "FACULTAD": "CIENCIAS FARMACÉUTICAS"
            },
            {
                "PROGRAMA": "FILOSOFÍA",
                "FACULTAD": "CIENCIAS HUMANAS"
            },
            {
                "PROGRAMA": "HISTORIA",
                "FACULTAD": "CIENCIAS HUMANAS"
            },
            {
                "PROGRAMA": "LENGUAS EXTRANJERAS CON ÉNFASIS EN INGLES Y FRANCÉS",
                "FACULTAD": "CIENCIAS HUMANAS"
            },
            {
                "PROGRAMA": "LINGÜÍSTICA Y LITERATURA",
                "FACULTAD": "CIENCIAS HUMANAS"
            },
            {
                "PROGRAMA": "COMUNICACIÓN SOCIAL",
                "FACULTAD": "CIENCIAS SOCIALES Y EDUCACIÓN "
            },
            {
                "PROGRAMA": "LICENCIATURA EN EDUCACIÓN CON ÉNFASIS EN CIENCIAS SOCIALES Y AMBIENTALES",
                "FACULTAD": "CIENCIAS SOCIALES Y EDUCACIÓN "
            },
            {
                "PROGRAMA": "LICENCIATURA EN EDUCACIÓN INFANTIL",
                "FACULTAD": "CIENCIAS SOCIALES Y EDUCACIÓN "
            },
            {
                "PROGRAMA": "TRABAJO SOCIAL",
                "FACULTAD": "CIENCIAS SOCIALES Y EDUCACIÓN "
            },
            {
                "PROGRAMA": "DERECHO",
                "FACULTAD": "DERECHO Y CIENCIAS POLÍTICAS"
            },
            {
                "PROGRAMA": "ENFERMERÍA",
                "FACULTAD": "ENFERMERÍA"
            },
            {
                "PROGRAMA": "ADMINISTRACIÓN DE SERVICIOS DE SALUD",
                "FACULTAD": "ENFERMERÍA"
            },
            {
                "PROGRAMA": "SEGURIDAD Y SALUD EN EL TRABAJO ",
                "FACULTAD": "ENFERMERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA CIVIL",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA DE ALIMENTOS",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA DE SISTEMAS (DISTANCIA)",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA DE SISTEMAS (PRESENCIAL)",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA DE SOFTWARE",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "INGENIERÍA QUÍMICA",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "TÉCNICO PROFESIONAL EN OPERACIÓN DE PROCESOS PETROQUÍMICOS",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "TECNOLOGÍA EN PROCESOS INDUSTRIALES",
                "FACULTAD": "INGENIERÍA"
            },
            {
                "PROGRAMA": "MEDICINA",
                "FACULTAD": "MEDICINA"
            },
            {
                "PROGRAMA": "ODONTOLOGÍA",
                "FACULTAD": "ODONTOLOGÍA"
            }
        ]
        const FACULTIES = [
            "CIENCIAS ECONÓMICAS",
            "CIENCIAS EXACTAS Y NATURALES",
            "CIENCIAS FARMACÉUTICAS",
            "CIENCIAS HUMANAS",
            "CIENCIAS SOCIALES Y EDUCACIÓN",
            "DERECHO Y CIENCIAS POLÍTICAS",
            "ENFERMERÍA",
            "INGENIERÍA",
            "MEDICINA",
            "ODONTOLOGÍA"
        ]
        const fillFacultiesOptions = () => {
            const facultySelect = document.getElementById('faculty');
            FACULTIES.forEach( faculty => {
                let option = document.createElement('option');
                option.value = faculty
                option.text = faculty;
                facultySelect.add(option);
            });
        }
        const fillProgramsOptions = (e) => {
                const filter = e.target.value;
                console.log(filter)
                const programSelect = document.getElementById('program');
                cleanselect(programSelect)
                let option = document.createElement('option');
                    option.value = "";
                    option.text = 'seleccione su programa';
                    option.setAttribute('disabled', '');
                    option.setAttribute('selected', '');
                    option.setAttribute('hidden', '');
                    programSelect.add(option);
                programsFiltered = PROGRAMS.filter(program => program.FACULTAD === filter)
                programsFiltered.forEach( program => {
                    let option = document.createElement('option');
                    option.value = program.PROGRAMA;
                    option.text = program.PROGRAMA;
                    programSelect.add(option);
                });
        }
        function cleanselect(select){
            for (let i = select.options.length; i >= 0; i--) {
                select.remove(i);
            }
        }
        window.onload = function() {
            fillFacultiesOptions()
            const facultySelect = document.getElementById('faculty');
            facultySelect.addEventListener('change', e => {
                fillProgramsOptions(e)
            })
        };
    </script>
</body>
</html>
