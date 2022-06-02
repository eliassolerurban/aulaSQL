@extends('static')
@section('content')
    <div class="jumbotron jumbotron-fluid">
      <div class="container jumbotron-content">
        <h1 class="display-4">¡Bienvenido!</h1>
        <p class="lead">El propósito general de este proyecto es el de facilitar el aprendizaje de SQL, a través de ejercicios que se realizan dentro de la misma aplicación.
        </p>
        <p class="lead"><span class="aulaSQL">aulaSQL</span> ofrece ejercicios clasificados por <a href={{ route('units') }}>unidades</a>.</p>
        <p class="lead">También puedes acceder a las <a href={{ route('classrooms') }}>aulas</a>, donde los <span class="teacher">profesores</span> pueden agrupar a los <span class="student">alumnos</span> para llevar un seguimiento y compartir resultados.</p>
      </div>
    </div>
</div>
@endsection