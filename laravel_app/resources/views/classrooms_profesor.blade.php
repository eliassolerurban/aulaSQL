@extends('static')
@section('content')
    <div class="create-classroom-container">
        <h2 class="mb-3">Crear un aula</h2>
        <form class="form-inline" method="post" action={{ route('create_classroom') }}>
            @csrf
            <input class="mr-2" type="text" name="classroom_name" placeholder="Nombre del aula">
            <button type="submit" class="btn teacher-btn">Crear</button>
        </form>
    </div>
    @if ($my_classrooms->count())
        @foreach ($my_classrooms as $classroom)
            <div class="classroom-header card">
                <div class="card-body">
                    <h1 class="text-center mt-2">{{ $classroom->name }}</h1>
                    <a class="teacher text-center align-middle" href={{ route('add_student_to_classroom', $classroom->id) }}>Añadir un
                        alumno a {{ $classroom->name }}</a>
                </div>

                <div class="classroom-container">
                    @if ($classroom->users->count())
                        <h4 class="text-center mt-3">Alumnos en este aula:</h4>
                        @foreach ($classroom->users as $user)
                            <div class="student-data">
                                <h5 class="text-center mb-5 mt-4">Datos del alumno <span
                                        class="student">{{ $user->email }}</span></h5>
                                @foreach ($units as $unit)
                                    <div class="unit-block">
                                        @if ($user->exercises->where('unit_id', $unit->id))
                                            <h5>{{ $unit->title }}</h5>
                                            <ul>
                                                @foreach ($user->exercises->where('unit_id', $unit->id) as $exercise)
                                                    <div class="mb-5">
                                                        <h5>Ejercicio {{ $exercise->id }}</h5>
                                                        <p>Enunciado: {{ $exercise->question }}</p>
                                                        <p>Intentos: {{ $exercise->pivot->tries }}</p>
                                                        @if ($exercise->pivot->state === 'passed')
                                                            <p>Estado: <span class="student">Correcto</span></p>
                                                        @else
                                                            <p>Estado: <span class="text-danger">Incorrecto</span></p>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endforeach
                        @endforeach
                </div>
        @endif
        </div>
        </div>
    @endforeach
    @endif
@endsection
