<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //buat method index untuk menmpilkan manajemen admin
    public function index()
    {
        //Dapatkan semua data admin dari model user
        $users = User::all();  //SELECT * FROM users

        return view('admin.manajemen-admin.index', [
            'title' => 'Manajemen Admin',
            'users' => $users,
        ]); 
    }
    //method untuk menampilkan form tambah admin
    public function create(){
        return view('admin.manajemen-admin.create', [
            'title' => 'Tambah Admin'
        ]);
    }
    //method unruk menyimpan data admin baru
    public function store(Request $request){
        //simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // kembalikan ke halaman manajemen admin
        return redirect('/users')->with('success', 'Data admin baru berhasil dismpan');
    }

    // method untuk menampilkan form edit admin
    public function edit($id){
        // cari data admin berdasarkan id
        $user = User::find($id);

        return view('admin.manajemen-admin.edit', [
            'title' => 'Edit Admin',
            'user' => $user,
        ]);
    }

    // method untuk menyimpan perubahan data admin
    public function update(Request $request, $id){
        // cari data admin berdsarkan id
        $user = User::find($id);

        // update data admin
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // kembalikan ke halaman manajemen admin
        return redirect('/users')->with('success', 'Data admin baru berhasil dismpan');
    }

    // method untuk menghapus data
    public function destroy($id)
    {
        // cari data admin berdasarkan id
        $user = User::find($id);

        // hapus data admin
        $user->delete();

        // kembalikan ke halaman manajemen admin
        return redirect('/users')->with('success', 'Data admin berhasil dihapus!');

    }
}
