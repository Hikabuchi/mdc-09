<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class)
                    ->withPivot(['role']);
    }

    public function producer(){
        return $this->belongsTo(Producer::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function seasons(){
        return $this->hasMany(Season::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}

