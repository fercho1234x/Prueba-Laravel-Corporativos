<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos_corporativo extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'D_FechaInicio',
        'D_FechaFin',
        'S_URLContrato',
        'corporativo_id'
    ];

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
