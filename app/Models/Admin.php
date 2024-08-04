<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "admins";

    protected $fillable = [
        'first_name',
        'surname',
        'specialty',
        'skills',
        'gender',
        'birth_date',
        'phone',
        'email',
        'country',
        'city',
        'profile_pic',
        'password',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
