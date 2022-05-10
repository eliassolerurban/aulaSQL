<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Exercise;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function prueba() {
        //insert into users values(null, 'profe1', 'profe1@email.com', null, '0000', 'profesor', null, null, null);
        //insert into users values(null, 'alu1', 'alu1@email.com', null, '0000', 'alumno', null, null, null);
        //insert into classrooms values(null, 'test-classroom', 1, null, null);
        //insert into units values(null, 'unidad0: prueba', 'debes tener en cuenta que se trata de una prueba', null, null);
        //insert into exercises values(null, 'Chicos, ¿en qué año fue 1+1?', 'El fantástico Ralph', 1, null, null);
        $profe = User::find(1);
        $alu = User::find(2);
        $class = Classroom::find(1);
        $exercise = Exercise::find(1);
        $unit = Unit::find(1);

        //adding profe to class
        // $profe -> attachClassrooms($class);
        //adding alu to class
        // $alu -> attachClassrooms($class);
        //adding exercise to unit
        return view('welcome', compact('profe', 'class', 'exercise'));
    }
}
