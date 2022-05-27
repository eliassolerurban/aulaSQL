<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get("/", function() {
    return redirect('/home');
    }
);
Route::get("/units", [Controller::class, 'units'])->name('units');
Route::get("/exams", [Controller::class, 'exams'])->name('exams');
Route::get("/classrooms", [Controller::class, 'classrooms'])->name('classrooms');
Route::post("/solve_exercise", [Controller::class, 'solve_exercise'])->name('solve_exercise');

