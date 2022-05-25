<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\ExamExercise;
use App\Models\ExamUser;
use App\Models\Exercise;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//drop table classroom_user;
//drop table exercise_user;
//drop table exam_exercise;
//drop table exam_user;
//drop table exam_exercise_exam_user ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function inicio() {
        return view('welcome');
    }
    
    public function units() {
            $units = Unit::all();
        
        return view('units', compact('units'));
    }
}
