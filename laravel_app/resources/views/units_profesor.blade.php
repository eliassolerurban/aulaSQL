@extends('static')
@section('content')
    <div class="E-R_container text-center m-4">
        <h3 class="m-4">Modelo E-R de la base de datos <span class="aulaSQL">empresa</span></h3>
        <img class="img-thumbnail" src={{ asset('img/ER.png') }}
            alt="Modelo entidad-relación de la base de datos empresa, sobre la que se realizan los ejercicios.">
    </div>

    @foreach ($units as $unit)
        <div class="unit-container">
            <h3 class="pb-4">{{ $unit->title }}</h3>
            @foreach ($unit->exercises as $exercise)
                    <div class="card exercise-container">
                        <h5 class="exercise-id"><strong>Ejercicio {{ $exercise->id }}</strong></h5>
                        <p class="exercise-question"><strong>Enunciado: {{ $exercise->question }}</strong></p>
                        <p class="exercise-answer">Respuesta: <pre>{{ $exercise->answer }}</pre></p>
                    </div>
            @endforeach
        </div>
    @endforeach
@endsection
