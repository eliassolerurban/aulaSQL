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
        
        return view('units', compact('units'));
    }

    public function exams() {
        $exams = Exam::all();
    
        return view('exams', compact('exams'));
    }

    public function classrooms() {
        $classrooms = Classroom::all();
    
        return view('classrooms', compact('classrooms'));
    }

    public function solve_exercise(Request $request){
        $request -> validate([
            'student_answer' => 'required',
            'exercise_id' => 'required'
        ]);
        
        $student = User::find(auth()->user())->first();
        // return back()->with('msg', $student);        
        return(
            $student->solveExercise($request->id_exercise, $request->student_answer) ?
                back()->with('msg', 'ok')
            :
                back()->with('msg', 'ko')                
        );

    }
}
