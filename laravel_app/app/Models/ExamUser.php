<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamUser extends Model
{
    protected $table = 'exam_user';
    
    use HasFactory;

    public function examExercises(){
        return $this->belongsToMany(ExamExercise::class)->withPivot('state');
    }
    //TODO: score for exam, not only for exercise
}
