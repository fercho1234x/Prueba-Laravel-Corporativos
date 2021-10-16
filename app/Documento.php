<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'S_Nombre',
        'N_Obligatorio',
        'S_Descripcion'
    ];

    /*  MUTATORS */

    public function setSNombreAttribute($S_Nombre) {
        $this->attributes['S_Nombre'] = mb_strtolower($S_Nombre);
    }

    /**
     * Relationships
     *
     *
     */
    public function corporativos() {
        return $this->belongsToMany(Corporativo::class, 'corporativos_documentos' )->withPivot('S_ArchivoUrl');
    }
}
