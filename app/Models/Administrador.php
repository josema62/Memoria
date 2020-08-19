<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
                    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administradors';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'correo', 'password'];
}
