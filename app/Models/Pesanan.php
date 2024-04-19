<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = [
      'id',
      'id_ruangan',
      'id_pegawai',
      'waktu_pinjam',
      'waktu_selesai',
      'tanggal_pinjam',
      'tanggal_selesai',
      'agenda',
      'judul',
    ];
    public function user() {
      return $this->belongsTo(User::class, 'id_pegawai','id');
    }
    public function ruangan() {
      return $this->belongsTo(admin\Ruangan::class, 'id_ruangan','id');
    }
}
