@extends('static')
@section('content')
    <div class="E-R_container text-center m-4">
        <h3 class="m-4">Modelo E-R de la base de datos <span class="aulaSQL">empresa</span></h3>
        <img class="img-thumbnail" src={{ asset('img/ER.png') }}
            alt="Modelo entidad-relación de la base de datos empresa, sobre la que se realizan los ejercicios.">
    </div>
    @foreach ($units as $unit)
        <div class="unit-container-student container">
            <h2 class="text-center m-5">{{ $unit->title }}</h2>
            <h4 class="mb-4">Ejercicios:</h4>
                @foreach ($unit->exercises as $exercise)
                    @if (session("_passed$exercise->id"))
                        {{-- //TODO: implement alert --}}
                        <script>
                            window.alert('¡Correcto!')
                        </script>
                    @endif
                    @if (session("_failed$exercise->id"))
                        <script>
                            window.alert("No es el resultado que se esperaba... \n" + @json($exercise->unit).clue)
                        </script>
                    @endif
                    <form class="" method='post' action={{ route('solve_exercise') }}>
                        @csrf
                        <h2 class="exercise-id">Ejercicio {{ $exercise->id }}</h2>
                        <p class="exercise-question">{{ $exercise->question }}</p>
                        <div>
                            <input type="hidden" name="exercise_id" value={{ $exercise->id }}>
                            <textarea name="student_answer" class="exercise-input form-control" type="text"></textarea>
                        </div>
                        <button type="submit" class="btn student-btn mt-3 mb-5">Enviar respuesta</button>
                    </form>
                @endforeach
        </div>
    @endforeach
@endsection
