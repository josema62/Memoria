<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\InstanciaCurso;
use App\Models\Proyecto;
use App\Models\Institucion;
use App\Models\Rol;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido', 'email', 'password','refrol', 'nickgit', 'passgit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function instanciacursos()
    {
        return $this->belongsToMany(InstanciaCurso::class, 'instanciacurso_user');
    }

    public function cursosprofesor()
    {
        return $this->hasMany(InstanciaCurso::class);
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_user');
    }

    public function instituciones()
    {
        return $this->hasMany(Institucion::class, 'refadmin');
    }

    public function role()
    {
        return $this->belongsTo(Rol::class, 'refrol');
    }
}
