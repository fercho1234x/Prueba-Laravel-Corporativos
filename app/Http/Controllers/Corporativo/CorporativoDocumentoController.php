<?php

namespace App\Http\Controllers\Corporativo;

use App\Corporativo;
use App\Documento;
use App\Http\Controllers\ApiController;
use App\Http\Requests\DocumentooRequest;

class CorporativoDocumentoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:store-corporativo-documento' )->only( 'store' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Corporativo $corporativo, DocumentooRequest $request)
    {
        $documento = Documento::create($request->validated());
        $corporativo->documentos()->syncWithoutDetaching([$documento->id => ['S_ArchivoUrl' => $request->S_ArchivoUrl]]);
        return $this->showMessage('Documentos Agregados', 200);
    }
}
