<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;
use App\Models\InstanciaCurso;

class Curso extends Model
{

                    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'refinstitucions'];

    
    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function instanciacursos()
    {
        return $this->hasMany(InstanciaCurso::class, 'refcurso');
    }
}
