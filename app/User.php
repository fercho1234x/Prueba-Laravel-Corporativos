<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles, SoftDeletes;

    protected $table = 'usuarios';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'S_Nombre',
        'S_Apellidos',
        'S_FotoPerfilUrl',
        'S_Activo',
        'password',
        'verification_token',
        'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*  MUTATORS */
    public function setUsernameAttribute($username) {
        $this->attributes['username'] = mb_strtolower($username);
    }

    public function setSNombreAttribute($S_Nombre) {
        $this->attributes['S_Nombre'] = mb_strtolower($S_Nombre);
    }

    public function setSApellidosAttribute($S_Apellidos) {
        $this->attributes['S_Apellidos'] = mb_strtolower($S_Apellidos);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Return if user is verified
     *
     *
     */
    public function isVerified()
    {
        return $this->email_verified_at ? true : false;
    }

    /**
     * Generate verification token
     *
     *
     */
    static public function generateVerificationToken()
    {
        return bin2hex(random_bytes(40));
    }

    /**
     * Relationships
     *
     *
     */

    public function corporativos() {
        return $this->hasMany(Corporativo::class);
    }
}
