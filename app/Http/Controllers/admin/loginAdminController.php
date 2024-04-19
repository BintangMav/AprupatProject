<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginAdminController extends Controller
{ public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.pages.admin.loginAdmin',['pageConfigs' => $pageConfigs]);
  }
  public function loginAdmin(Request $request)
  {
    // dd($request);
    if(Auth::guard('admin')->attempt($request->only('username', 'password'))) {
      $admin = Auth::guard('admin')->user();
      Session::put('admin', $admin);
      // dd($admin);
      return redirect()->route('dashboardAdmin.index');
    }
      else{
        return back()->with('error', 'Maaf Username dan Password yang Anda Masukan Salah!');
    }
  }
  public function logoutAdmin() {
    Auth::guard('admin')->logout();
    return redirect()->route('loginAdmin.index');
  }
}
