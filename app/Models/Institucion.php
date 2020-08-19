<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\User;

class Institucion extends Model
{
                /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'institucions';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'razonsocial', 'refadmin'];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'refinstitucions');
    }

    public function administrador()
    {
        return $this->belongsTo(User::class, 'refadmin');
    }
}
