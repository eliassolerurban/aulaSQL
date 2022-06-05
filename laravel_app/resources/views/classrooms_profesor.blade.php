@extends('static')
@section('content')
    {{-- //TODO: implement accordion for students --}}

    <div class="create-classroom-container">
        <h2>Crear un aula</h2>
        <form class="create_classroom_form" method="post" action={{ route('create_classroom') }}>
            @csrf
            <input type="text" name="classroom_name" placeholder="Nombre del aula">
            <button type="submit" class="btn teacher-btn">Crear</button>
        </form>
    </div>

{{-- 

    <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collapsible Group Item #1
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Collapsible Group Item #2
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Collapsible Group Item #3
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
 --}}














    @if ($my_classrooms->count())
        @foreach ($my_classrooms as $classroom)
        
        <div class="classroom-container" id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2>{{ $classroom->name }}</h2>
                    <a class="teacher" href={{ route('add_student_to_classroom', $classroom->id) }}>Añadir un alumno</a>
                        <h5 class="mb-0">
                            @foreach ($classroom->users as $user)

                            <div data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="student-data">
                                <p>{{ $user->email }}</p>
                                @foreach ($units as $unit)
                                    <div class="unit-block">
                                        @if ($user->exercises->where('unit_id', $unit->id))
                                            <h3>{{ $unit->title }}</h3>
                                            <ul>
                                                @foreach ($user->exercises->where('unit_id', $unit->id) as $exercise)
                                                    <h5>Ejercicio {{ $exercise->id }}</h5>
                                                    <p>{{ $exercise->question }}</p>
                                                    <p>Intentos: {{ $exercise->pivot->tries }}</p>
                                                    <p>Estado:
                                                        {{ $exercise->pivot->state === 'passed' ? 'Correcto' : 'Incorrecto' }}
                                                    </p>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endforeach
    
                        </h5>
                      </div>
            {{-- //FIXME: accordion not working --}}
            {{-- //FIXME: css in vps --}}
        </div>
                @if ($classroom->users->count())
                    <h4>Alumnos en este aula:</h4>
                    @foreach ($classroom->users as $user)
                        <div class="student-data">
                            <p>{{ $user->email }}</p>
                            @foreach ($units as $unit)
                                <div class="unit-block">
                                    @if ($user->exercises->where('unit_id', $unit->id))
                                        <h3>{{ $unit->title }}</h3>
                                        <ul>
                                            @foreach ($user->exercises->where('unit_id', $unit->id) as $exercise)
                                                <h5>Ejercicio {{ $exercise->id }}</h5>
                                                <p>{{ $exercise->question }}</p>
                                                <p>Intentos: {{ $exercise->pivot->tries }}</p>
                                                <p>Estado:
                                                    {{ $exercise->pivot->state === 'passed' ? 'Correcto' : 'Incorrecto' }}
                                                </p>
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
