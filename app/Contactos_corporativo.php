<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos_corporativo extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'S_Nombre',
        'S_Puesto',
        'S_Comentarios',
        'S_TelefonoFijo',
        'S_TelefonoMovil',
        'S_Email',
        'corporativo_id'
    ];

    /*  MUTATORS */

    public function setSNombreAttribute($S_Nombre) {
        $this->attributes['S_Nombre'] = mb_strtolower($S_Nombre);
    }

    public function setSPuestoAttribute($S_Puesto) {
        $this->attributes['S_Puesto'] = mb_strtolower($S_Puesto);
    }

    /**
     * Relationships
     *
     *
     */
    public function corporativo()
    {
        return $this->belongsTo(Corporativo::class);
    }
}
