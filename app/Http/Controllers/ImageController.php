<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request){
        // Validasi data request
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:5048',
            'title' => 'required'
        ]);

        // Ambil file yang diupload
        $file = $request->file('file');

        // Nama file
        $filename = time() . '.' . $file->extension();

        // Pindahka file ke folder publick/images
        $file->move(public_path('images'), $filename);

        // Simpan ke database
        Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $filename,
            'title' => $request->title,
        ]);

        // Redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Ambil data image berdasarkan id
        $image = Image::find($id);

        // Hapus file dari folder public/images
        unlink(public_path('images/' . $image->file));

        // Hapus data dari database
        $image->delete();

        // Redirect ke halaman sebelumnya
        return back()->with('success', 'Foto berhasil dihapus');
    }
}
