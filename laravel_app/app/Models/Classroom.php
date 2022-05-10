<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    use HasFactory;
}
