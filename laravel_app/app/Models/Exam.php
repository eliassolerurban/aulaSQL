<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function exercises(){
        return $this->belongsToMany(Exercise::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    //attach exam
    // $user->exams()->attach([1 => ['exercise_id' => '2']]);
}
