<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Datos del profesor</h2>
        {{ 'Nombre: '.$profe->name }}<br>
        {{ 'Email: '.$profe->email }}<br>
        {{ 'Aulas en las que da clase: ' }}<br>
        <ul>
            @foreach ($profe->classrooms as $classroom)  
                <li>{{$classroom->name}}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
    <div>
        <h2>Datos del aula {{$class->name}}</h2>
        {{'Creador: '.$class->creator->name }}<br>
        {{'General: '.$class }}<br>
    </div>
    <br>
    <br>
    {{'Usuarios en este aula:' }}<br>
    <ul>
        @foreach ($class->users as $user)  
            <li>{{$user->name}}</li>
        @endforeach
    </ul>
    {{'Alumnos en este aula:' }}<br>
    <ul>
        @foreach ($alus as $alu)  
            <li>{{$alu->name}}</li>
            <ul>
            @foreach ($alu->exercises as $exercise)
                    <li>Intentos: en el ejercicio {{$exercise->question.': '.$exercise->pivot->tries}}</li>
                    <li>
                        {{$exercise->pivot->state === 'passed' ? 'Aprobado' : 'Suspendido'}} 
                    </li>
            @endforeach
            </ul>
        @endforeach
    </ul>
    <h2>{{'Examen programado:' }}<br></h2>
    <h3>{{$exam->name}}</h3>
    {{'Creador: '.$exam->creator->name }}<br>
    {{'Ejercicios: '.$exam->exercises }}<br>
</body>
</html>