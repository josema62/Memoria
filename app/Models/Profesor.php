<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Profesor as Authenticatable;

class Profesor extends Model
{
            /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profesors';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'correo', 'password'];
}
