<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\VerificationMessage;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use ApiResponser;
    /**
     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $fields = $request->validated();
        $fields['verification_token'] = User::generateVerificationToken();
        $user = User::create($fields);
        // $user->assignRole('admin');
        return $this->showOne($user);
    }
}
