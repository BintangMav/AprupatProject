<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class loginPegawaiController extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.pages.pegawai.loginPegawai',['pageConfigs' => $pageConfigs]);
  }
  public function loginPegawai(Request $request)
  {
      if(Auth::guard('web')->attempt($request->only('username', 'password'))) {
          // Menyimpan informasi user ke dalam session
          $user = Auth::guard('web')->user();
          Session::put('pegawai', $user);
          // dd($user);

          return redirect()->route('dashboard.index');
      } else {
          return back()->with('error', 'Maaf Username dan Password yang Anda Masukkan Salah!');
      }
  }
  public function logoutPegawai() {
    Auth::logout();
    return redirect('login');
  }
  
}
