<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
             'title' => 'categories',
             'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Tambah Kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Category::create([
            'title'=> $request->title,
        ]);

        // Redirect ke halaman categorues.
        return redirect('/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Edit Kategori',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate Request
        $request->validate([
            'title' => 'required',
        ]);

        // update data
        $category-> update([
            'title' => $request->title,
        ]);

        // Redirect ke halaman categories
        return redirect('/categories')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus data
        $category->delete();

        // Redirect ke halaman categories
        return redirect('/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
