<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Registration extends Authenticatable
{
    protected $table = 'registrations';  // add if your table name is not default

    protected $primaryKey = 'user_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone', 'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // requires Laravel 9+
    ];
}
