@extends('static')
@section('content')
{{-- //TODO: implement dropdown for students --}}
{{-- <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </div> --}}

<h2>Crear un aula</h2>
<form class="create_classroom_form" method="post" action={{ route('create_classroom') }}>
    @csrf
    <input type="text" name="classroom_name" placeholder="Nombre del aula: ">
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
    @if($my_classrooms->count())
        @foreach ($my_classrooms as $classroom)
            <h2>{{$classroom->name}}</h2>
            <a href={{route('add_student_to_classroom', $classroom->id)}}>Añadir un alumno</a>

            <div class="classroom-container">
                @if($classroom->users->count())
                <h4>Alumnos en este aula:</h4>
                @foreach ($classroom->users as $user)
                    
                    <div class="student-data">
                        <p>{{ $user->email }}</p>
                            @foreach($units as $unit)
                                
                                <div class="unit-block">
                                    @if($user->exercises->where('unit_id', $unit->id))
                                    <h3>{{$unit->title}}</h3>
                                    <ul>
                                        @foreach($user->exercises->where('unit_id', $unit->id) as $exercise)
                                            <h5>Ejercicio {{ $exercise->id }}</h5>
                                            <p>{{ $exercise->question }}</p>
                                            <p>Intentos: {{ $exercise->pivot->tries }}</p>
                                            <p>Estado: {{ $exercise->pivot->state === 'passed' ? 'Correcto' : 'Incorrecto' }}</p>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            @endforeach
                @endforeach
                    </div>
                    
            @endif
            </div>

        @endforeach
    @endif
@endsection

