<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* AUTH */
Route::namespace('Auth')->group(function() {
	Route::prefix('auth')->name('auth.')->group(function() {
		Route::get('email/verify/{token}', 'VerificationController@verify')->name('verification.verify');
		Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');

		Route::post('email/password/reset', 'PasswordResetController@sendEmailToken')->name('password.reset.front');
        Route::post('password/reset', 'PasswordResetController@resetPasswordLaravel')->name('reset.password');

        Route::post('email/password/reset/front', 'PasswordResetController@sendEmailTokenFront')->name('password.reset.front');
        Route::post('email/password/reset', 'PasswordResetController@resetPasswordFrontend')->name('reset.password');
	});
	Route::apiResource('register', 'RegisterController')->only('store');
});

/* OAUTH */
Route::prefix('oauth')->name('oauth.')->group(function() {

	Route::post('token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

	Route::get('token/validate', function () {
	    return ['message' => 'ok', 'code' => 200];
	})->middleware('auth:api');

});

/* USERS */
//middleware('email.verified')
Route::namespace('User')->group(function() {
	Route::prefix('users')->name('users.')->group(function() {

	});
	Route::apiResource('users', 'UserController');
});

/* CORPORATIVOS */
//middleware('email.verified')
Route::namespace('Corporativo')->group(function() {
    Route::prefix('corporativos')->name('corporativos.')->group(function() {
        Route::post('{corporativo}/documento', 'CorporativoDocumentoController@store')->name('documento.store');
        Route::get('{corporativo}/empresas/contratos/documentos/contactos', 'CorporativoController@showCorporativoEmpresasContratosDocumentosContactos')->name('empresas.documentos.contactos.show');
    });
    Route::apiResource('corporativos', 'CorporativoController');
});

/* DOCUMENTOS */
//middleware('email.verified')
Route::namespace('Documento')->group(function() {
    Route::prefix('documentos')->name('documentos.')->group(function() {
        Route::get('{documento}/corporativos', 'DocumentoController@showDocumentosCorporativo')->name('corporativos.show');
        Route::post('{documento}/corporativos/{corporativo}', 'DocumentoCorporativoController@store')->name('corporativos.store');
    });
    Route::apiResource('documentos', 'DocumentoController');
});

/* EMPRESAS CORPORATIVOS */
//middleware('email.verified')
Route::namespace('EmpresaCorporativo')->group(function() {
    Route::prefix('empresas-corporativos')->name('empresas-corporativos.')->group(function() {

    });
    Route::apiResource('empresas-corporativos', 'EmpresaCorporativoController');
});

/* CONTACTOS CORPORATIVOS */
//middleware('email.verified')
Route::namespace('ContactoCorporativo')->group(function() {
    Route::prefix('contactos-corporativos')->name('contactos-corporativos.')->group(function() {

    });
    Route::apiResource('contactos-corporativos', 'ContactoCorporativoController');
});

/* CONTRATOS CORPORATIVOS */
//middleware('email.verified')
Route::namespace('ContratoCorporativo')->group(function() {
    Route::prefix('contratos-corporativos')->name('contratos-corporativos.')->group(function() {

    });
    Route::apiResource('contratos-corporativos', 'ContratoCorporativoController');
});
