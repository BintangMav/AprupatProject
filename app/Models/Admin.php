<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'id',
        'id_pegawai',
        'username',
        'password',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_pegawai','id');
    }

    public function akses() {
        return $this->hasMany(Akses::class, 'id_admin','id');
    }
    protected $hidden = [
      'password',
      'remember_token',
  ];
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];
}
