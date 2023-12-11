<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    const ROLE_SUPER_ADMIN = 'SUPER_ADMIN';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_EMPLOYEE = 'EMPLOYEE';
    const ROLE_USER = 'USER';

    const ROLES = [
        self::ROLE_SUPER_ADMIN => 'Super Admin',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_EMPLOYEE => 'Employee',
        self::ROLE_USER => 'User',
    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function scopeSearch($query, $val)
    {
        return $query->where('name', 'like', '%' . $val . '%')
            ->orWhere('fname', 'like', '%' . $val . '%')
            ->orWhere('email', 'like', '%' . $val . '%');
    }

    public function clock_ins()
    {
        return $this->hasMany(ClockIn::class);
    }
}
