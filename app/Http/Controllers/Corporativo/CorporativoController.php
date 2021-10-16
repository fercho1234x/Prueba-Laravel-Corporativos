<?php

namespace App\Http\Controllers\Corporativo;

use App\Corporativo;
use App\Http\Controllers\ApiController;
use App\Http\Requests\CorporativoRequest;
use App\User;

class CorporativoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-corporativos' )->only( 'index' );
        // $this->middleware( 'can:show-corporativoEmpresasContratosDocumentosContactos' )->only( 'showCorporativoEmpresasContratosDocumentosContactos' );
        // $this->middleware( 'can:store-corporativo' )->only( 'store' );
        // $this->middleware( 'can:update-corporativo' )->only( 'update' );
        // $this->middleware( 'can:show-corporativo' )->only( 'show' );
        // $this->middleware( 'can:delete-corporativo' )->only( 'delete' );
        // $this->middleware( 'can:delete-corporativo' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return $this->showOne(Corporativo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CorporativoRequest $request)
    {
        return $this->showOne(Corporativo::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporativo  $corporativo

     */
    public function show(Corporativo $corporativo)
    {
        return $this->showOne($corporativo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corporativo  $corporativo

     */
    public function showCorporativoEmpresasContratosDocumentosContactos(Corporativo $corporativo)
    {
        $resp['corporativo'] = $corporativo;
        $corporativo->empresas;
        $corporativo->contactos;
        $corporativo->contratos;
        $corporativo->documentos;
        return $this->showOne($resp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Corporativo  $corporativo

     */
    public function update(CorporativoRequest $request, Corporativo $corporativo)
    {
        $corporativo->update($request->validated());
        return $this->showOne($corporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corporativo  $corporativo

     */
    public function destroy(Corporativo $corporativo)
    {
        $corporativo->delete();
        return $this->showOne($corporativo);
    }
}
