<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Pesanan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/events/{ruangan_id}', function ($ruangan_id) {
  $events = Pesanan::where('id_ruangan', $ruangan_id)->get()->map(function ($pesanan) {
      return [
          'id' => $pesanan->id,
          'title' => $pesanan->judul,
          'start' => $pesanan->tanggal_pinjam . 'T' . $pesanan->waktu_pinjam,
          'end' => $pesanan->tanggal_selesai . 'T' . $pesanan->waktu_selesai,
      ];

  });

  return response()->json($events);
});
