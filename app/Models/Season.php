<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function series(){
        return $this->hasMany(Serie::class);
    }
}
