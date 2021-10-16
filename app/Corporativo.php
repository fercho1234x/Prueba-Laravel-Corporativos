<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporativo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'S_NombreCorto',
        'S_NombreCompleto',
        'S_LogoURL',
        'S_DBName',
        'S_DBUsuario',
        'S_DBPassword',
        'S_SystemUrl',
        'S_Activo',
        'D_FechaIncorporacion',
        'usuario_id',
        'FK_Asignado_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'S_DBPassword'
    ];

    /*  MUTATORS */

    public function setSNombreCortoAttribute($S_NombreCorto) {
        $this->attributes['S_NombreCorto'] = mb_strtolower($S_NombreCorto);
    }

    public function setSNombreCompletoAttribute($S_NombreCompleto) {
        $this->attributes['S_NombreCompleto'] = mb_strtolower($S_NombreCompleto);
    }

    // public function setSDBPasswordAttribute($S_DBPassword)
    // {
    //     $this->attributes['S_DBPassword'] = bcrypt($S_DBPassword);
    // }

    /**
     * Relationships
     *
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function empresas() {
        return $this->hasMany(Empresas_corporativo::class);
    }

    public function contactos() {
        return $this->hasMany(Contactos_corporativo::class);
    }

    public function contratos() {
        return $this->hasMany(Contratos_corporativo::class);
    }

    public function documentos() {
        return $this->belongsToMany(Documento::class, 'corporativos_documentos' )->withPivot('S_ArchivoUrl');
    }
}
