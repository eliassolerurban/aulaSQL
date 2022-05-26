<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ExerciseController extends Controller{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function solve_exercise($id_exercise){
        $student = User::find(auth()->user());
        //TODO: class method solve_exercise for User
        // $student->solve_exercise($id_exercise);
    }
}