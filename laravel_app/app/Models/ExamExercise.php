<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamExercise extends Model
{
    protected $table = 'exam_exercise';

    use HasFactory;

    public function examUsers(){
        return $this->belongsToMany(ExamUser::class)->withPivot('score');
    }
}
