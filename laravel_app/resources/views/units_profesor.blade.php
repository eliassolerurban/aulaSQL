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
        <p class="exercise-question">{{ $exercise->question }}</p>
        <p class="exercise-question">{{ $exercise->answer }}</p>
        </form>
        <br>
        <br>
        <br>
    @endforeach
        </div>
    @endforeach
@endsection

