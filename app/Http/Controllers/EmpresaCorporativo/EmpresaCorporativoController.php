<?php

namespace App\Http\Controllers\EmpresaCorporativo;

use App\Empresas_corporativo;
use App\Http\Controllers\ApiController;
use App\Http\Requests\EmpresaCorporativoRequest;


class EmpresaCorporativoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-empresa-corporativos' )->only( 'index' );
        // $this->middleware( 'can:store-empresa-corporativo' )->only( 'store' );
        // $this->middleware( 'can:update-empresa-corporativo' )->only( 'update' );
        // $this->middleware( 'can:show-empresa-corporativo' )->only( 'show' );
        // $this->middleware( 'can:delete-empresa-corporativo' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showOne(Empresas_corporativo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaCorporativoRequest $request)
    {
        return $this->showOne(Empresas_corporativo::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresas_corporativo  $empresas_corporativo
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas_corporativo $empresas_corporativo)
    {
        return $this->showOne($empresas_corporativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Empresas_corporativo  $empresas_corporativo
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaCorporativoRequest $request, Empresas_corporativo $empresas_corporativo)
    {
        $empresas_corporativo->update($request->validated());
        return $this->showOne($empresas_corporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresas_corporativo  $empresas_corporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas_corporativo $empresas_corporativo)
    {
        $empresas_corporativo->delete();
        return $this->showOne($empresas_corporativo);
    }
}
