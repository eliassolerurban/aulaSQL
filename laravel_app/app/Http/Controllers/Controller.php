<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exam;
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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function prueba() {
        //insert into users values(null, 'profe1', 'profe1@email.com', null, '0000', 'profesor', null, null, null);
        //insert into users values(null, 'alu1', 'alu1@email.com', null, '0000', 'alumno', null, null, null);
        //insert into users values(null, 'alu2', 'alu2@email.com', null, '0000', 'alumno', null, null, null);
        //insert into classrooms values(null, 'test-classroom', 1, null, null);
        //insert into units values(null, 'unidad0: prueba', 'debes tener en cuenta que se trata de una prueba', null, null);
        //insert into exercises values(null, 'Chicos, ¿en qué año fue 1+1?', 'El fantástico Ralph', 1, null, null);
        //insert into exercise_user values(null, 2, 1, 'passed', 3, null, null);
        //insert into exams values(null, 'Examen de prueba', 1, null, null);
        //insert into exam_exercise values(null, 1, 1, null, null);
        //insert into exam_user values(null, 1, 2, null, null);
        $profe = User::find(1);
        $alus = User::where('role', 'alumno')->get();
        $class = Classroom::find(1);
        $exercise = Exercise::find(1);
        $unit = Unit::find(1);
        $exam = Exam::find(1);
        //adding profe to class
        // $profe -> attachClassrooms($class);
        //adding alus to class
        // $alus[0] -> attachClassrooms($class);
        // $alus[1] -> attachClassrooms($class);
        //adding exercise to unit
        return view('welcome', compact('profe', 'class', 'exercise', 'alus', 'unit', 'exam'));
    }
}
