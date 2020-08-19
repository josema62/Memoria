<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\User;

class InstanciaCurso extends Model
{

                        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instancia_cursos';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ano', 'semestre', 'refcurso', 'refprofesor'];


    //$instanciacurso->users
    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'instanciacurso_user');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'instancia_curso_id');
    }

    public function profesor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
