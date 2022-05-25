@extends('static')
@section('content')
    @foreach ($units as $unit)
        <div class="unit-container">
            <h2>{{$unit->title}}</h2>
            <h4>Ejercicios:</h4>
            @foreach ($unit->exercises as $exercise)
                <p class="exercise-question">{{$exercise->question}}</p>
                <input class="exercise-input" type="text">
                <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                <br>
                <br>
                <br>
            @endforeach
        </div>
    @endforeach
@endsection

