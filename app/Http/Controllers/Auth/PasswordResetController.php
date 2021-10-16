<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\PasswordResetConfirmationMessage;
use App\PasswordReset;
use App\Traits\ApiResponser;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    use ApiResponser;

    /**
     *
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmailToken()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email']
        ]);
        Password::sendResetLink( $credentials );
        return  $this->showMessage('E-mail sent');
    }

    public function resetPasswordLaravel(ResetPasswordRequest $request) {
        $email_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($email_password_status == Password::INVALID_TOKEN) {
            return response()->json([ 'data' => 'Invalid Password Token' ], 200);
        }
        return  $this->showMessage('Password successfully changed');
    }

    public function sendEmailTokenFront()
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        User::where('email', request('email'))->firstOrFail();
        PasswordReset::where( 'email', request('email') )->delete();
        $fields = request()->all();
        $fields['token'] = PasswordReset::generateVerificationToken();
        $fields['created_at'] = now();
        $passwordReset = PasswordReset::create($fields);
        return $this->showOne($passwordReset);
    }

    public function resetPasswordFrontend(ResetPasswordRequest $request)
    {
        $emailToken = PasswordReset::where([
                                        'email' => request('email'),
                                        'token' => request('token'),
                                    ])
                                    ->firstOrFail();

        $dateCreated = Carbon::parse($emailToken->created_at);

        if ($dateCreated->diffInMinutes() > 60) {
            $emailToken->delete();
            $fields = request()->all();
            $fields['token'] = PasswordReset::generateVerificationToken();
            $fields['expires_at'] = now()->addHours(1);
            PasswordReset::create($fields);
            return $this->errorResponse('Expired token, token forwarded', 400);
        }


        $user = User::where('email', request('email'))->firstOrFail();
        $user->password = request('password');
        $user->save();
        $emailToken->delete();
        Mail::to($user)->queue(new PasswordResetConfirmationMessage($user));
        return  $this->showMessage('Password successfully changed');
    }
}
