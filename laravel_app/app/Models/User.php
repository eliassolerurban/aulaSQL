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

    public static function current_user(){
        return User::find(auth()->user())->first();
    }

    public function exercise_tried($exercise_id){
        $student = User::current_user();
        return $student->exercises()->where('exercise_id', $exercise_id)->count() > 0;
    }

    public function exercise_failed($exercise_id){
        $student = User::current_user();
        return $student->exercises()->where('exercise_id', $exercise_id)->first()->pivot->state == 'failed';
    }

    public function set_exercise_state($exercise_id, $expected_result, $student_result){
        $student = User::current_user();
        
        //TODO: make this work
        if($student->exercises()->where('exercise_id', $exercise_id)->first() and
            $student->exercises()->where('exercise_id', $exercise_id)->first()->pivot->state === 'passed'){
            return 'passed';
        }
        return $expected_result === $student_result ? 'passed' : 'failed' ;
    }

    public function solve_exercise($exercise_id, $student_answer){
        $student = User::current_user();
        $exercise = Exercise::find($exercise_id)->where('id', $exercise_id)->first();
        
        $expected_result = DB::connection('empresa')->select($exercise->answer);
        $student_result = DB::connection('empresa')->select($student_answer);
        
        $state = $student->set_exercise_state($exercise_id, $expected_result, $student_result); 
        
        if(!$student->exercise_tried($exercise_id)){
            $student->exercises()->attach($exercise->id, ['tries' => 1, 'state' => $state]);
        }

        else if($state === 'failed'){
            $tries = $student->exercises()->where('exercise_id', $exercise_id)->first()->pivot->tries;  
            $student->exercises()->updateExistingPivot($exercise->id, ['tries' => ++$tries]);
        }
        else{
            $student->exercises()->updateExistingPivot($exercise->id, ['state' => $state]);
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
