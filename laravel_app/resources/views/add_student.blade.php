@extends('static')
@section('content')
<div class="add-student-container">
    <h2>{{$classroom->name}}</h2>
    <form class="form-inline" method="post" action={{ route('add_student_to_classroom', $classroom->id) }}>
        @csrf
        <input class="mr-2" type="text" name="student_email" placeholder="Email del alumno">
        <input type="hidden" name="classroom_id" value={{ $classroom->id }}>
        <button type="submit" class="btn teacher-btn">Añadir</button>
    </form>
    @if(session('ok'.$classroom->id))
        {{-- //TODO: alert: https://getbootstrap.com/docs/4.0/components/alerts/ --}}
        <script>window.alert(@json(session('ok'.$classroom->id)))</script>
    @endif
    @if(session('ko'.$classroom->id))
        {{-- //TODO: alert: https://getbootstrap.com/docs/4.0/components/alerts/ --}}
        <script>window.alert(@json(session('ko'.$classroom->id)))</script>
    @endif
</div>

@endsection

