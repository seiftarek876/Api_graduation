<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class admins extends Authenticatable
{

    use HasApiTokens, HasFactory;
   protected $fillable = [
       'name',
       'email',
       'password',
       'phone',
       'role',
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
   protected $casts = [
    'email_verified_at' => 'datetime',
];
public function binGroups() {
    return $this->hasMany(binGroups::class , 'admin_id');
}
}
