<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Jabatan;
use App\Models\User;

class karyawanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $user = User::all();
      $jabatan = Jabatan::all();
      return view('content.pages.admin.karyawan.index', compact('user','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request);
      $request->validate([
        'nik' => ['required'],
        'nama' => ['required'],
        'jenis_kelamin' => ['required'],
        'alamat' => ['required'],
        'no_telp' => ['required'],
        'email' => ['required'],
        'id_jabatan' => ['required'],
        'status_jabatan' => ['required'],
        'username' => ['required'],
        'password' => ['required'],
      ]);
      $user = new User;
      $user->nik = $request->nik;
      $user->nama = $request->nama;
      $user->jenis_kelamin = $request->jenis_kelamin;
      $user->alamat = $request->alamat;
      $user->no_telp = $request->no_telp;
      $user->email = $request->email;
      $user->id_jabatan = $request->id_jabatan;
      $user->status_jabatan = $request->status_jabatan;
      $user->username = $request->username;
      $user->password = $request->password;
      $user->save();
      return redirect()->back()->with('message','Data berhasil dibuat !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $user = User::find($id);
      $jabatan = Jabatan::all();
      return view('content.pages.admin.karyawan.edit', compact('user','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $request->validate([
        'nik' => ['required'],
        'nama' => ['required'],
        'jenis_kelamin' => ['required'],
        'alamat' => ['required'],
        'no_telp' => ['required'],
        'email' => ['required'],
        'id_jabatan' => ['required'],
        'status_jabatan' => ['required'],
        'username' => ['required'],
        'password' => ['required'],
      ]);
      $user = User::find($id);
      $user->nik = $request->nik;
      $user->nama = $request->nama;
      $user->jenis_kelamin = $request->jenis_kelamin;
      $user->alamat = $request->alamat;
      $user->no_telp = $request->no_telp;
      $user->email = $request->email;
      $user->id_jabatan = $request->id_jabatan;
      $user->status_jabatan = $request->status_jabatan;
      $user->username = $request->username;
      $user->password = $request->password;
      $user->save();
      return redirect()->back()->with('message','Data berhasil dibuat !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','Data berhasil dihapus !');
    }
}
