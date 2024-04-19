<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $fillable = [
      'id',
      'nama_jabatan',
      'status',
    ];
    public function Jabatan()
    {
      return $this->hasMany(Jabatan::class, 'id', 'id');
    }
}


