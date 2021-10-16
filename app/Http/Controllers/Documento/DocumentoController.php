<?php

namespace App\Http\Controllers\Documento;

use App\Documento;
use App\Http\Controllers\ApiController;
use App\Http\Requests\DocumentooRequest;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-documentos' )->only( 'index' );
        // $this->middleware( 'can:store-documento' )->only( 'store' );
        // $this->middleware( 'can:update-documento' )->only( 'update' );
        // $this->middleware( 'can:show-documento' )->only( 'show' );
        // $this->middleware( 'can:delete-documento' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showOne(Documento::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentooRequest $request)
    {
        return $this->showOne(Documento::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return $this->showOne($documento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function showDocumentosCorporativo(Documento $documento)
    {
        $resp['documento'] = $documento;
        $documento->corporativos;
        return $this->showOne($resp);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentooRequest $request, Documento $documento)
    {
        $documento->update($request->validated());
        return $this->showOne($documento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $documento->Corporativos()->detach();
        $documento->delete();
        return $this->showOne($documento);
    }
}
