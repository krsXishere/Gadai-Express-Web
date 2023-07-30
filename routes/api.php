<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BarangAPIController;
use App\Http\Controllers\api\KategoriAPIController;
use App\Http\Controllers\api\MerkAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Barang
Route::get('barang', [BarangAPIController::class, 'index']);
Route::get('barang/{id}', [BarangAPIController::class, 'show']);
Route::post('barang/store', [BarangAPIController::class, 'store']);
Route::post('barang/update/{id}', [BarangAPIController::class, 'update']);
Route::delete('barang/delete/{id}', [BarangAPIController::class, 'destroy']);
Route::get('barang/{kategori_id}/{merk_id}', [BarangAPIController::class, 'barang']);

//Kategori
Route::get('kategori', [KategoriAPIController::class, 'index']);
Route::get('kategori/merk/{id}', [KategoriAPIController::class, 'merk']);
Route::get('kategori/barang/{id}', [KategoriAPIController::class, 'barang']);

//Merk
Route::get('merk', [MerkAPIController::class, 'index']);
