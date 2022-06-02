<?php

namespace App\Models;

use Exception;
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

    public function solve_exercise($exercise_id, $student_answer){
        $student = User::current_user();
        $exercise = Exercise::find($exercise_id)->where('id', $exercise_id)->first();
        
        $expected_result = DB::connection('empresa')->select($exercise->answer);
        
        try{
            $student_result = DB::connection('empresa')->select($student_answer);
        }
        catch(Exception $e){
            $student_result = false;
        }
        
        $last_try = $student->exercises()->where('exercise_id', $exercise_id)->first();
        $last_try_state = $last_try ? $last_try->pivot->state : null;

        if($last_try_state === 'passed'){
            return $expected_result == $student_result;
        }        


        $new_state = $expected_result == $student_result ? 'passed' : 'failed';
        
        if(!$student->exercise_tried($exercise_id)){
            $student->exercises()->attach($exercise->id, ['tries' => 0, 'state' => $new_state]);
        }

        else{
            $student->exercises()->updateExistingPivot($exercise->id, ['state' => $new_state]);
        }
        
        $tries = $student->exercises()->where('exercise_id', $exercise_id)->first()->pivot->tries;
        $student->exercises()->updateExistingPivot($exercise->id, ['tries' => ++$tries]);
        
        return $expected_result == $student_result;
    }
    
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    public function create_classroom($classroom_name){
        $teacher = User::find(auth()->user()->id);
        $new_classroom = new Classroom();
        $new_classroom->name = $classroom_name;
        $new_classroom->creator_id = $teacher->id;
        $new_classroom->save();

    }

    public function created_classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function add_student_to_classroom($student_id, $classroom_id){
        $classroom = Classroom::find($classroom_id);
        $classroom->users()->attach($student_id);
    }
}
