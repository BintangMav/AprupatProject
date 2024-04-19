<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Jabatan;
use Illuminate\Http\Request;

class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $jabatan = Jabatan::all();
      return view('content.pages.admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'nama_jabatan' => ['required'],
      ]);
      $jabatan = new Jabatan;
      $jabatan->nama_jabatan = $request->nama_jabatan;
      $jabatan->save();
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
      $jabatan = Jabatan::find($id);
      return view('content.pages.admin.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $request->validate([
        'nama_jabatan' => ['required'],
      ]);
      $jabatan = Jabatan::find($id);
      $jabatan->nama_jabatan = $request->nama_jabatan;
      $jabatan->save();
      return redirect()->back()->with('message','Data berhasil dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Request $request, $id){
      $datajabatan = Jabatan::where('id', '=', $id)->first();
      // Periksa status dan ubah status
      if ($datajabatan->status == "1") {
          $datajabatan->status = "0"; // Nonaktifkan
          $message = 'Data berhasil dinonaktifkan!';
      } elseif ($datajabatan->status == "0") {
          $datajabatan->status = "1"; // Aktifkan
          $message = 'Data berhasil diaktifkan!';
      }
      $datajabatan->save();
      return redirect()->back()->with('message',$message);
    }
}
