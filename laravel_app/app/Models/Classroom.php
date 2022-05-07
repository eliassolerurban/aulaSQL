<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    use HasFactory;
}
