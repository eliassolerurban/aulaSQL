<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }
    
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit');
    }

    public function exams(){
        return $this->belongsToMany(Exam::class);
    }

    public function users_exams(){
        return $this->belongsToMany(User::class);
    }
}
