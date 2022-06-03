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
@if($my_classrooms->count())
    @foreach($my_classrooms as $classroom)
        <div class="classroom-container">
            <h2>{{$classroom->name}}</h2>
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
                @endforeach
                    </div>
            @endif
        </div>
    @endforeach
@else
    <h2>Vaya... parece que todavía no estás en ningún aula</h2>
@endif
@endsection

