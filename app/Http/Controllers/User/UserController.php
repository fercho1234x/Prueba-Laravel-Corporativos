<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        // Permissions and roles
        // $this->middleware( 'can:index-users' )->only( 'index' );
        // $this->middleware( 'can:store-user' )->only( 'store' );
        // $this->middleware( 'can:update-user' )->only( 'update' );
        // $this->middleware( 'can:show-user' )->only( 'show' );
        // $this->middleware( 'can:delete-user' )->only( 'delete' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showOne(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $fields = $request->validated();
        $fields['verification_token'] = User::generateVerificationToken();
        // Role
        // $user->assignRole('admin');
        return $this->showOne(User::create($fields), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne($user);
    }
}
