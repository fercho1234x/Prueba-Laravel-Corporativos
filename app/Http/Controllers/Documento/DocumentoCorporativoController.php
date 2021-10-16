<?php

namespace App\Http\Controllers\Documento;

use App\Corporativo;
use App\Documento;
use App\Http\Controllers\ApiController;

class DocumentoCorporativoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:store-documento-corporativo' )->only( 'store' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Documento $documento, Corporativo $corporativo)
    {
        request()->validate(['S_ArchivoUrl' => 'string', 'url']);
        $documento->corporativos()->syncWithoutDetaching([$corporativo->id => ['S_ArchivoUrl' => request('S_ArchivoUrl')]]);
        return $this->showMessage('Documentos Agregados', 200);
    }
}
