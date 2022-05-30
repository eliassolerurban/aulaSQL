@extends('static')
@section('content')
    {{-- @foreach ($classrooms as $classroom)
        <div class="classroom-container">
            <h2>{{$classroom->name}}</h2>
            <h4>Creado por: {{ $classroom->creator->name }}</h4>
            <h4>Alumnos en este aula:</h4>
            @foreach ($classroom->users as $user)
                <div class="student-data">
                    <p>$user->name</p>
                </div>
                <br>
                <br>
                <br>
            @endforeach
        </div>
    @endforeach --}}
@endsection

