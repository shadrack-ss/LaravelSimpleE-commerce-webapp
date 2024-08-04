<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class MyUsers extends Authenticatable

{
    use HasFactory,  Notifiable;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'myusers';
    protected $fillable = [
        'name',
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
        'usertype',
        'password',
        'usertype'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}