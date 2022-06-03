<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Unit;
use App\Models\User;
use Exception;
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
        $user = User::find(auth()->user())->first();
        $units = Unit::all();
        $classrooms = Classroom::all();
        
        if($user->role === 'alumno'){
            try{
                $my_classrooms = $user->classrooms ? $user->classrooms : []; 
            }
            catch(Exception $e){
                $my_classrooms = [];
            }
        }
        else{
            $my_classrooms = $classrooms->where('creator_id', auth()->user()->id);    
        }

        return(
            auth()->user()->role === 'alumno' ?
                view('classrooms_alumno', compact('my_classrooms', 'units'))
            :
            view('classrooms_profesor', compact('my_classrooms', 'units'))
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
        $teacher = User::find(auth()->user())->first();
        
        $request -> validate([
            'student_email' => 'required',
            'classroom_id' => 'required'
        ]);
        
        $student = User::where('email', $request->student_email)->get()->first() ?? null;
        
        try{
            $student_in_classroom = $student->classrooms->where('id', $request->classroom_id)->first();
        } catch(Exception $e){
            $student_in_classroom = false;
        }
        
        if($student and $student->role === 'alumno'){
            if($student_in_classroom){
                return back()->with('ok'.$request->classroom_id, "¡El alumno con email $student->email ya estaba en este aula!");
            }

            $teacher->add_student_to_classroom($student->id, $request->classroom_id);
            return back()->with('ok'.$request->classroom_id, "¡El alumno con email $student->email se ha añadido correctamente al aula $request->classroom_id");
        }
        
        return back()->with('ko'.$request->classroom_id, 'Vaya... parece que no existe el alumno con este email');
    }

    public function add_student_to_classroom_view($classroom_id){
        $classroom = Classroom::find($classroom_id);
        return view('add_student', compact('classroom'));
    }
}
