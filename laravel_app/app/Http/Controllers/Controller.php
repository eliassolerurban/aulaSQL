<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
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
        $profe = User::find(1);
        $alu = User::find(2);
        $class = Classroom::find(1);
        //adding profe to class
        // $profe -> attachClassrooms($class);
        //adding alu to class
        // $alu -> attachClassrooms($class);
        return view('welcome', compact('profe', 'class'));
    }
}
