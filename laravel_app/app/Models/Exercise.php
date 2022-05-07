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
}
