<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthWEBController;
use App\Http\Controllers\BerandaWEBController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthWEBController::class, 'index'])->name('login');
Route::post('login', [AuthWEBController::class, 'login'])->name('process-login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', [BerandaWEBController::class, 'index'])->name('beranda');

    //User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/tambah', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

    //Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/tambah', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/kategori/search', [KategoriController::class, 'search'])->name('kategori.search');

    //Merk
    Route::get('/merk', [MerkController::class, 'index'])->name('merk');
    Route::get('/merk/create', [MerkController::class, 'create'])->name('merk.create');
    Route::post('/merk/tambah', [MerkController::class, 'store'])->name('merk.store');
    Route::get('/merk/edit/{id}', [MerkController::class, 'edit'])->name('merk.edit');
    Route::put('/merk/update/{id}', [MerkController::class, 'update'])->name('merk.update');
    Route::delete('/merk/destroy/{id}', [MerkController::class, 'destroy'])->name('merk.destroy');
    Route::get('/merk/search', [MerkController::class, 'search'])->name('merk.search');

    //Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/tambah', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');

    //Auth Logout
    Route::post('logout', [AuthWEBController::class, 'logout'])->name('logout');
});
