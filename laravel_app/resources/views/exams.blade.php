@extends('static')
@section('content')
    @foreach ($exams as $exam)
        <div class="exam-container">
            <h2>{{$exam->name}}</h2>
            <h4>Ejercicios:</h4>
            @foreach ($exam->exercises as $exercise)
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

