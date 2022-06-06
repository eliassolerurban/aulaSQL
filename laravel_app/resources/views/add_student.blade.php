@extends('static')
@section('content')

<h2>{{$classroom->name}}</h2>
<form class="add_student_to_classroom_form" method="post" action={{ route('add_student_to_classroom', $classroom->id) }}>
    @csrf
    <input type="text" name="student_email" placeholder="Email del alumno">
    <input type="hidden" name="classroom_id" value={{ $classroom->id }}>
    <button type="submit" class="btn btn-primary">Añadir</button>
</form>
@if(session('ok'.$classroom->id))
    {{-- //TODO: alert: https://getbootstrap.com/docs/4.0/components/alerts/ --}}
    <script>window.alert(@json(session('ok'.$classroom->id)))</script>
@endif
@if(session('ko'.$classroom->id))
    {{-- //TODO: alert: https://getbootstrap.com/docs/4.0/components/alerts/ --}}
    <script>window.alert(@json(session('ko'.$classroom->id)))</script>
@endif

@endsection

