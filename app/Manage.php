<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manage extends Authenticatable
{
  protected $table = 'manage';
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
      'gender',
      'nickname',
      'group_id',
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
