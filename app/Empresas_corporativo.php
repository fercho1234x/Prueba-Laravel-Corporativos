<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresas_corporativo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'S_RazonSocial',
        'S_RFC',
        'S_Pais',
        'S_Estado',
        'S_Municipio',
        'S_ColoniaLocalidad',
        'S_Domicilio',
        'S_CodigoPostal',
        'S_UsoCFDI',
        'S_UrlRFC',
        'S_UrlActaConstitutiva',
        'S_Activo',
        'S_Comentarios',
        'corporativo_id'
    ];

    /*  MUTATORS */

    public function setSRazonSocialAttribute($S_RazonSocial) {
        $this->attributes['S_RazonSocial'] = mb_strtolower($S_RazonSocial);
    }

    public function setSRFCAttribute($S_RFC) {
        $this->attributes['S_RFC'] = mb_strtolower($S_RFC);
    }

    public function setSPaisAttribute($S_Pais) {
        $this->attributes['S_Pais'] = mb_strtolower($S_Pais);
    }

    public function setSEstadoAttribute($S_Estado) {
        $this->attributes['S_Estado'] = mb_strtolower($S_Estado);
    }

    public function setSMunicipioAttribute($S_Municipio) {
        $this->attributes['S_Municipio'] = mb_strtolower($S_Municipio);
    }

    public function setSColoniaLocalidadAttribute($S_ColoniaLocalidad) {
        $this->attributes['S_ColoniaLocalidad'] = mb_strtolower($S_ColoniaLocalidad);
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
