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
    
    public function exercises(){
        return $this->belongsToMany(Exercise::class)->withPivot('tries', 'state');
    }

    public function check_exercise_untried($exercise_id){
        $student = User::find(auth()->user())->first();
        return $student->exercises()->where('exercise_id', $exercise_id) ? false : true;
    }

    public function check_exercise_failed($exercise_id){
        $student = User::find(auth()->user())->first();
        return $student->exercises()->where('exercise_id', $exercise_id)->first()->state == 'failed';
    }

    public function solve_exercise($exercise_id, $student_answer){
        $student = User::find(auth()->user())->first();
        $exercise = Exercise::find($exercise_id)->where('id', $exercise_id)->first();
        
        $expected_result = DB::connection('empresa')->select($exercise->answer);
        $student_result = DB::connection('empresa')->select($student_answer);    
        
        $state = $expected_result == $student_result ? 'passed' : 'failed';

        if($student->check_exercise_untried($exercise_id)){
            $student->exercises()->attach($exercise->id, ['tries' => '0', 'state' => $state]);        
        }
        //TODO: update exercise tries not working yet
        if ($student->check_exercise_failed($exercise->id)){
            $student->exercises()->updateExistingPivot($exercise->id, ['tries' => 1]);        
        }

        return $expected_result == $student_result;
    }
    
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    public function created_classrooms(){
        return $this->hasMany(Classroom::class);
    }
}
