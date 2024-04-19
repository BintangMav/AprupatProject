<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Ruangan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ruanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        $events = Pesanan::select('id', 'judul as title', 'tanggal_pinjam as start', 'tanggal_selesai as end')->get();
        return view('content.pages.pegawai.ruangan.index', compact('ruangan', 'events'));
    }

    public function detail($id)
    {
        $ruangan = Ruangan::find($id);
        return view('content.pages.pegawai.ruangan.detail', compact('ruangan'));
    }
    public function detailPesanan($id)
    {
        $user = Auth::user();
        $pesanan = Pesanan::find($id);
        $ruangan = Ruangan::find($id);
        return view('content.pages.pegawai.ruangan.detailPesanan', compact('pesanan', 'ruangan'));
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
      $request->validate([
        'tanggal_waktu' => ['required'],
            'durasi' => ['required'],
            'agenda' => ['required'],
            'judul' => ['required'],
            'ruangan' => ['required'],
        ]);

        $tanggal_waktu = $request->tanggal_waktu;
        $durasi = $request->durasi;
        $agenda = $request->agenda;
        $judul = $request->judul;

        [$tanggal, $waktu] = explode(' ', $tanggal_waktu);
        $waktu_pinjam = date('H:i', strtotime($waktu));
        $waktu_selesai = date('H:i', strtotime($waktu . ' +' . $durasi . ' minutes'));

        $pegawai = Auth::user()->id;
        $id_ruangan = $request->ruangan;

        $ruangan = new Pesanan();
        $ruangan->id_pegawai = $pegawai;
        $ruangan->id_ruangan = $id_ruangan;
        $ruangan->tanggal_pinjam = $tanggal;
        $ruangan->tanggal_selesai = $tanggal;
        $ruangan->waktu_pinjam = $waktu_pinjam;
        $ruangan->waktu_selesai = $waktu_selesai;
        $ruangan->agenda = $agenda;
        $ruangan->judul = $judul;
        $ruangan->save();

        return redirect()->back()->with('message', 'Ruangan Berhasil dipesan !');
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
        $pesanan = Pesanan::find($id);
        return view('content.pages.pegawai.ruangan.edit', compact('pesanan'));
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(Request $request, string $id)
      {
        // dd($request);
        $request->validate([
          'tanggal_waktu' => ['required'],
            'durasi' => ['required'],
            'agenda' => ['required'],
            'judul' => ['required'],
            'ruangan' => ['required'],
        ]);

        $tanggal_waktu = $request->tanggal_waktu;
        $durasi = $request->durasi;
        $agenda = $request->agenda;
        $judul = $request->judul;

        [$tanggal, $waktu] = explode(' ', $tanggal_waktu);
        $waktu_pinjam = date('H:i', strtotime($waktu));
        $waktu_selesai = date('H:i', strtotime($waktu . ' +' . $durasi . ' minutes'));

        $pegawai = Auth::user()->id;
        $id_ruangan = $request->ruangan;

        $ruangan = Pesanan::find($id);
        $ruangan->id_pegawai = $pegawai;
        $ruangan->id_ruangan = $id_ruangan;
        $ruangan->tanggal_pinjam = $tanggal;
        $ruangan->tanggal_selesai = $tanggal;
        $ruangan->waktu_pinjam = $waktu_pinjam;
        $ruangan->waktu_selesai = $waktu_selesai;
        $ruangan->agenda = $agenda;
        $ruangan->judul = $judul;
        $ruangan->save();

        return redirect()->back()->with('message', 'Ruangan Berhasil dipesan !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
