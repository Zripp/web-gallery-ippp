<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomepageController::class, 'index']);

// Route untuk menampilkan halaman login

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

// Route untuk memproses login

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Route untuk pengunjung yang sudah login

Route::middleware('auth')->group(function(){
    
    Route::get('/admin', function(){

        return view('admin.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    });

    Route::get('/users',[UserController::class,'index']);


    // Route untuk menampilkan form tambah admin

    Route::get('/users/create', [UserController::class,'create']);

    // Route untuk menyimpan data admin baru
    
    Route::post('/users/store', [UserController::class, 'store']);

    // Route untuk menampilkan form edit admin

    Route::get('/users/{id}/edit',[UserController::class, 'edit']);

    // Route untuk menyimpan perubahan data admin

    Route::put('/users/{id}/update', [UserController::class, 'update']);

    // Route untuk menghapus data admin

    Route::get('/users/{id}/destroy', [UserController::class, 'destroy']);

    // Route untuk logout

    Route::get('/logout', [AuthController::class, 'logout']);

    // Route untuk CRUD category

    Route::resource('categories', CategoryController::class );

    // Route untuk CRUD post

    Route::resource('posts', PostController::class);

    // Route untuk CRUD gallery

    Route::resource('galleries', GalleryController::class);

    // Route untuk menympan foto

    Route::post('/images/store', [ImageController::class, 'store']);

    // Route untuk hapus foto

    Route::delete('/images/{id}', [ImageController::class, 'destroy']);


});
