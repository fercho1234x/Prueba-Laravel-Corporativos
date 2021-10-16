<?php

namespace App\Http\Controllers\ContactoCorporativo;

use App\Contactos_corporativo;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ContactoCorporativoRequest;

class ContactoCorporativoController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-contactos-corporativos' )->only( 'index' );
        // $this->middleware( 'can:store-contactos-corporativo' )->only( 'store' );
        // $this->middleware( 'can:update-contactos-corporativo' )->only( 'update' );
        // $this->middleware( 'can:show-contactos-corporativo' )->only( 'show' );
        // $this->middleware( 'can:delete-contactos-corporativo' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showOne(Contactos_corporativo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoCorporativoRequest $request)
    {
        return $this->showOne(Contactos_corporativo::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactos_corporativo  $contactos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function show(Contactos_corporativo $contactos_corporativo)
    {
        return $this->showOne($contactos_corporativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Contactos_corporativo  $contactos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function update(ContactoCorporativoRequest $request, Contactos_corporativo $contactos_corporativo)
    {
        $contactos_corporativo->update($request->validated());
        return $this->showOne($contactos_corporativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactos_corporativo  $contactos_corporativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactos_corporativo $contactos_corporativo)
    {
        $contactos_corporativo->delete();
        return $this->showOne($contactos_corporativo);
    }
}
