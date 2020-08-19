<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
                /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repositorios';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['linkgit'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
