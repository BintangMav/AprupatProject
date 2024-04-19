<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class aksesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();
        $admin = Admin::all();
        $user = User::all();
        return view('content.pages.admin.akses.index',compact('user','admin'));
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
        'id_pegawai' => ['required'],
        'username' => ['required'],
        'password' => ['required'],
      ]);
      $admin = new Admin;
      $admin->id_pegawai = $request->id_pegawai;
      $admin->username = $request->username;
      $admin->password = $request->password;
      $admin->save();
      return redirect()->back()->with('message','Akses Admin telah di buat');
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
}
