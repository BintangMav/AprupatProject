<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
        'nik'=>'123',
        'nama'=>'pegawai1',
        'jenis_kelamin'=>'laki',
        'alamat'=>'bdg',
        'no_telp'=>'089',
        'email'=>'bintang@gmail.com',
        'id_jabatan'=>null,
        'status_jabatan'=>'Direksi',
        'username'=>'pegawai1@gmail.com',
        'password'=>'123456',
      ]);
        Admin::create([
        'id_pegawai'=>'1',
        'username'=>'admin1@gmail.com',
        'password'=>bcrypt('123456'),
      ]);
    }
}
