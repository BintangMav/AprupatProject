<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Ruangan;

class ruanganAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $ruangan = Ruangan::all();
      return view('content.pages.admin.ruangan.index',compact('ruangan'));
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
  // dd($request);
  $request->validate([
    'nama_ruangan' => ['required'],
    'tipe_ruangan' => ['required'],
    'lokasi' => ['required'],
    'foto' => ['required', 'image','mimes:jpeg,jpg,png'], // Menambahkan validasi untuk file gambar
]);
if ($request->hasFile('foto')) {
    $foto = $request->file('foto');
    $fotoPath = 'storage/room/';
    $fotoName = time() . '_' . $foto->getClientOriginalName();
    $foto->move($fotoPath, $fotoName);
} else {
    // Tangani jika gambar tidak diunggah dengan benar
    return redirect()->back()->with('error','Gambar tidak valid!');
}

$link_ruangan = $request->input('link_ruangan') ?? '';
$kode_ruangan = $request->input('kode_ruangan') ?? '';
$maksimal_pegawai = $request->input('maksimal_pegawai') ?? 0;

// Simpan data ruangan ke basis data
$ruangan = new Ruangan;
$ruangan->nama_ruangan = $request->nama_ruangan;
$ruangan->tipe_ruangan = $request->tipe_ruangan;
$ruangan->lokasi = $request->lokasi;
$ruangan->maksimal_pegawai = $request->maksimal_pegawai;
$ruangan->link_ruangan = $link_ruangan;
$ruangan->kode_ruangan = $kode_ruangan;
$ruangan->maksimal_pegawai = $maksimal_pegawai;
$ruangan->foto = $fotoName;
$ruangan->save();

return redirect()->back()->with('message', 'Data berhasil dibuat!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function status(Request $request, $id){
      $dataRuangan = Ruangan::where('id', '=', $id)->first();
      // Periksa status dan ubah status
      if ($dataRuangan->status == "1") {
          $dataRuangan->status = "0"; // Nonaktifkan
          $message = 'Data berhasil dinonaktifkan!';
      } elseif ($dataRuangan->status == "0") {
          $dataRuangan->status = "1"; // Aktifkan
          $message = 'Data berhasil diaktifkan!';
      }
      $dataRuangan->save();
      return redirect()->back()->with('message',$message);
    }
}
