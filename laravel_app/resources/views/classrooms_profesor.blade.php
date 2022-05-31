@extends('static')
@section('content')

<h2>Crear un aula</h2>
<form class="create_classroom_form" method="post" action={{ route('create_classroom') }}>
    @csrf
    <input type="text" name="classroom_name" placeholder="Nombre del aula: ">
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
    @if($classrooms->count())
        @foreach ($classrooms as $classroom)
            <div class="classroom-container">
                <h2>{{$classroom->name}}</h2>
                <a href={{route('add_student_to_classroom', $classroom->id)}}>Añadir un alumno</a>
                @if($classroom->users->count())
                    <h4>Alumnos en este aula:</h4>
                    @foreach ($classroom->users as $user)
                        <div class="student-data">
                            <p>{{ $user->email }}</p>
                                @foreach($units as $unit)
                                    <div class="unit-block">
                                        <h3>{{$unit->title}}</h3>
                                        <ul>
                                            @foreach($user->exercises->where('unit_id', $unit->id) as $exercise)
                                                <h5>Ejercicio {{ $exercise->id }}</h5>
                                                <p>{{ $exercise->question }}</p>
                                                <p>Intentos: {{ $exercise->pivot->tries }}</p>
                                                <p>Estado: {{ $exercise->pivot->state === 'passed' ? 'Correcto' : 'Incorrecto' }}</p>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                        </div>
                        <br>
                        <br>
                        <br>
                    @endforeach
                @endif
                {{-- <h4>Creado por: {{ $classroom->creator->name}}</h4> --}}
            </div>
        @endforeach
    @endif
@endsection

