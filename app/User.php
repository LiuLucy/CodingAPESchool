<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable {

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'card_id',
        'birthday',
        'gender',
        'type_id',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
