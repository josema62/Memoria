<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repositorio;
use App\User;

class Proyecto extends Model
{
                /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proyectos';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'estado'];

    public function instanciacurso()
    {
        return $this->belongsTo(InstanciaCurso::class, 'instancia_curso_id');
    }

    public function repositorios()
    {
        return $this->hasMany(Repositorio::class, 'refproyecto');
    }

    public function alumnosproyecto()
    {
        return $this->belongsToMany(User::class, 'proyecto_user');
    }
}
