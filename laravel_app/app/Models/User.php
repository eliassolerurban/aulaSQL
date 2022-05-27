<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(){
        return $this->role;
    }
    
    public function classrooms(){
        return $this->belongsToMany(Classroom::class);
    }

    public function attachClassrooms($classroom){
        $this -> classrooms() -> attach($classroom);
    }
    
    public function detachClassrooms($classroom){
        $this -> classrooms() -> detach($classroom);
    }
    
    public function exercises(){
        return $this->belongsToMany(Exercise::class)->withPivot('tries', 'state');
    }

    public function attachExercises($exercise){
        $this -> exercises() -> attach($exercise);
    }
    
    public function detachExercise($classrooms){
        $this -> classrooms() -> detach($classrooms);
    }

    public function solveExercise($exercise_id, $student_answer){
        $exercise = Exercise::find($exercise_id);
        $expected_result = DB::connection('empresa')->select($exercise->answer);
        $student_result = DB::connection('empresa')->select($student_answer);
        //TODO: complete method with tries and so on
        
        return $expected_result;
    }
    
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    public function created_classrooms(){
        return $this->hasMany(Classroom::class);
    }
}
