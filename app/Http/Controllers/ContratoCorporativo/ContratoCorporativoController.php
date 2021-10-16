<?php

namespace App\Http\Controllers\ContratoCorporativo;

use App\Contratos_corporativo;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ContratoCorporativoRequest;

class ContratoCorporativoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-contratos-corporativos' )->only( 'index' );
        // $this->middleware( 'can:store-contratos-corporativo' )->only( 'store' );
        // $this->middleware( 'can:update-contratos-corporativo' )->only( 'update' );
        // $this->middleware( 'can:show-contratos-corporativo' )->only( 'show' );
        // $this->middleware( 'can:delete-contratos-corporativo' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showOne(Contratos_corporativo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoCorporativoRequest $request)
    {
        return $this->showOne(Contratos_corporativo::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contratos_corporativo  $contratos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function show(Contratos_corporativo $contratos_corporativo)
    {
        return $this->showOne($contratos_corporativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Contratos_corporativo  $contratos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoCorporativoRequest $request, Contratos_corporativo $contratos_corporativo)
    {
        $contratos_corporativo->update($request->validated());
        return $this->showOne($contratos_corporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contratos_corporativo  $contratos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contratos_corporativo $contratos_corporativo)
    {
        $contratos_corporativo->delete();
        return $this->showOne($contratos_corporativo);
    }
}
