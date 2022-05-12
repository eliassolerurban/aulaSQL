<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamUser extends Pivot
{
    use HasFactory;

    public function examExercises(){
        return $this->belongsToMany(ExamExercise::class);
    }
}
