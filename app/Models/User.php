<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Make sure to extend this class
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Change this line if needed
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // You can add any additional methods or properties here as needed
}
