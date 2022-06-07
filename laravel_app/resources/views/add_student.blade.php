@extends('static')
@section('content')
    <div class="add-student-container">
        <h2>{{ $classroom->name }}</h2>
        <form class="form-inline" method="post" action={{ route('add_student_to_classroom', $classroom->id) }}>
            @csrf
            <input class="mr-2" type="text" name="student_email" placeholder="Email del alumno">
            <input type="hidden" name="classroom_id" value={{ $classroom->id }}>
            <button type="submit" class="btn teacher-btn">Añadir</button>
        </form>
        @if (session('ok' . $classroom->id))
            <div class="alert alert-success mt-4" role="alert">
                <p>{{ session('ok' . $classroom->id) }}</p>
            </div>
        @endif
        @if (session('ko' . $classroom->id))
            <div class="alert alert-danger mt-4" role="alert">
                <p>{{ session('ko' . $classroom->id) }}</p>
            </div>
    
            {{-- <script>
                window.alert(@json(session('ko' . $classroom->id)))
            </script> --}}
        @endif
    </div>
@endsection
