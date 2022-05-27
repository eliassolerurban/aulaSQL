@extends('static')
@section('content')
<div class="E-R_container">
    <img src={{ asset('img/ER.png') }} alt="Modelo entidad-relación de la base de datos empresa, sobre la que se realizan los ejercicios.">
</div>
@foreach ($units as $unit)
<div class="unit-container">
    <h2>{{$unit->title}}</h2>
    <h4>Ejercicios:</h4>
    @foreach ($unit->exercises as $exercise)
        @if(session("check$exercise->id"))
            <h1>{{session("check$exercise->id")}}</h1>
        @endif
    <p class="exercise-question">{{$exercise->question}}</p>
                <form method='post' action={{ route("solve_exercise") }}>
                    @csrf
                    <input type="hidden" name="exercise_id" value={{ $exercise->id }}>
                    <input name="student_answer" class="exercise-input" type="text">
                    <button type="submit" class="btn btn-primary">Enviar respuesta</button>
                </form>
                <br>
                <br>
                <br>
            @endforeach
        </div>
    @endforeach
@endsection

