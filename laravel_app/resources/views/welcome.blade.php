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
    </div>
    <br>
    <br>
    {{'Usuarios en este aula:' }}<br>
    <ul>
        @foreach ($class->users as $user)  
            <li>{{$user->name}}</li>
        @endforeach
    </ul>
    {{'Ejercicio 1: '.$exercise->question}}<br>
    {{'Respuesta: '.$exercise->answer}}
</body>
</html>