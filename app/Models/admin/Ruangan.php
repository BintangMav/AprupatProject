<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangans';
    protected $fillable = [
      'id',
      'foto',
      'nama_ruangan',
      'tipe_ruangan',
      'link_ruangan',
      'kode_ruangan',
      'lokasi',
      'maksimal_pegawai',
      'status',
    ];
}
