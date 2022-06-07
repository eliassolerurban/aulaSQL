<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta description="El propósito general de este proyecto es el de facilitar el aprendizaje de SQL, a través de ejercicios que se realizan dentro de la misma aplicación.">
    <title>aulaSQL</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="shortcut icon" sizes="64x64" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('aulaSQL.css') }}>
</head>

<body>
    <div class="fix-nav"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="aulaSQL navbar-brand" href={{ route('home') }}>aulaSQL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link aulaSQL-a" href={{ route('home') }}>Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link aulaSQL-a" href={{ route('classrooms') }}>Aulas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link aulaSQL-a" href={{ route('units') }}>Unidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link aulaSQL-a" href={{ route('exams') }}>Exámenes</a>
                </li>
            </ul>
            @if(auth()->user()->role === 'alumno')
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle student" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person student" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg></i> </a>
                <div class="dropdown-menu student" aria-labelledby="navbarDropdown">
                    <p class="dropdown-item profile-item">Nombre: {{ auth()->user()->name }}</p>
                    <p class="dropdown-item profile-item">Email: {{ auth()->user()->email }}</p>
                    <p class="dropdown-item profile-item">Rol: <span class="student">{{ auth()->user()->role }}</span></p>
                    <a href={{ route('logout') }} class="btn btn-danger" type="submit">Cerrar sesión</a> 
                </div>
            @else
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle teacher" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person teacher" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg></i> </a>
                <div class="dropdown-menu teacher" aria-labelledby="navbarDropdown">
                    <p class="dropdown-item profile-item">Nombre: {{ auth()->user()->name }}</p>
                    <p class="dropdown-item profile-item">Email: {{ auth()->user()->email }}</p>
                    <p class="dropdown-item profile-item">Rol: <span class="teacher">{{ auth()->user()->role }}</span></p>
                    <a href={{ route('logout') }} class="btn btn-danger" type="submit">Cerrar sesión</a> 
                </div>
            @endif
            </div>

        </div>
    </nav>

    @yield('content')
    
    <footer class="footer bg-dar">
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
<script>$('.alert').alert()</script>
</body>

</html>
