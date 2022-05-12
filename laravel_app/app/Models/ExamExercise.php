<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamExercise extends Pivot
{
    use HasFactory;

    public function examUsers(){
        return $this->belongsToMany(ExamUser::class);
    }
}
