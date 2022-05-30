<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamExercise;
use App\Models\ExamUser;
use App\Models\Exercise;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home() {
        return view('welcome');
    }
    
    public function units() {
        $units = Unit::all();
        
        return(
            auth()->user()->role === 'alumno' ?
                view('units_alumno', compact('units'))
            :
                view('units_profesor', compact('units'))
        );
    }

    public function exams() {
        $exams = Exam::all();
    
        return view('exams', compact('exams'));
    }

    public function classrooms() {
        $student = User::find(auth()->user())->first();
        $classrooms = Classroom::all();
        
        return(
            auth()->user()->role === 'alumno' ?
                view('classrooms_alumno', compact('classrooms'))
            :
            view('classrooms_profesor', compact('classrooms'))
        );
    }

    public function solve_exercise(Request $request){
        $request -> validate([
            'student_answer' => 'required',
            'exercise_id' => 'required'
        ]);
        
        $student = User::find(auth()->user())->first();
        return(
            $student->solve_exercise($request->exercise_id, $request->student_answer) ?
                back()->with("_passed$request->exercise_id" , true)
            :
                back()->with("_failed$request->exercise_id" , true)                
        );

    }

    public function create_classroom(Request $request){
        $request -> validate([
            'classroom_name' => 'required'
        ]);

        $teacher = User::find(auth()->user())->first();
        $teacher->create_classroom($request->classroom_name);
        return back();
    }

    public function add_student_to_classroom(Request $request){
        $teacher = User::find(auth()->user());
        $request -> validate([
            'student_email' => 'required',
            'classroom_id' => 'required' //hidden
        ]);
        
        $student = User::where('email', $request->studen_email)->first() ?? null;
        
        if($student and $student->role==='alumno'){
            $teacher->add_student_to_classroom_to_classroom($student->id, $request->classroom_id);
            return back()->with('msg'.$request->classroom_id, "¡El alumno con email $student->email se ha añadido correctamente!");
        }
        return back()->with('msg'.$request->classroom_id, 'Vaya, parece que el alumno no existe...');
    }

    public function add_student_to_classroom_view($classroom_id){
        $classroom = Classroom::find($classroom_id);
        return view('add_student', compact('classroom'));
    }
}
