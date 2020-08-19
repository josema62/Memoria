<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'refrol');
    }
}
