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
                <a href={{route()}}>Añadir un alumno</a>
                {{-- <h4>Creado por: {{ $classroom->creator->name}}</h4> --}}
                {{-- <h4>Alumnos en este aula:</h4>
                @foreach ($classroom->users as $user)
                    <div class="student-data">
                        <p>$user->name</p>
                    </div>
                    <br>
                    <br>
                    <br>
                @endforeach --}}
            </div>
        @endforeach
    @endif
@endsection

