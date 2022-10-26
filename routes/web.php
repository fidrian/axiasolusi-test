<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;

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
Route::get("/", [TransaksiController::class, "index"]);

Auth::routes();

Route::get("/user", [UserController::class, "index"]);
Route::get("/user/add", [UserController::class, "user_add"]);
Route::post('/user/store',[UserController::class, "user_store"]);
Route::get("/user/edit/{id}", [UserController::class, "user_edit"]);
Route::post('/user/update',[UserController::class, "user_update"]);
Route::get('/user/delete/{id}',[UserController::class, "user_delete"]);
Route::get("/supplier", [SupplierController::class, "index"]);
Route::get("/supplier/add", [SupplierController::class, "supplier_add"]);
Route::post('/supplier/store',[SupplierController::class, "supplier_store"]);
Route::get("/supplier/edit/{id}", [SupplierController::class, "supplier_edit"]);
Route::post('/supplier/update',[SupplierController::class, "supplier_update"]);
Route::get('/supplier/delete/{id}',[SupplierController::class, "supplier_delete"]);
Route::get("/barang", [BarangController::class, "index"]);
Route::get("/barang/add", [BarangController::class, "barang_add"]);
Route::post('/barang/store',[BarangController::class, "barang_store"]);
Route::get("/barang/edit/{id}", [BarangController::class, "barang_edit"]);
Route::post('/barang/update',[BarangController::class, "barang_update"]);
Route::get('/barang/delete/{id}',[BarangController::class, "barang_delete"]);
Route::get("/transaksi", [TransaksiController::class, "index"]);
Route::get("/transaksi/add", [TransaksiController::class, "transaksi_add"]);
Route::post('/transaksi/store',[TransaksiController::class, "transaksi_store"]);
Route::get("/transaksi/edit/{id}", [TransaksiController::class, "transaksi_edit"]);
Route::post('/transaksi/update',[TransaksiController::class, "transaksi_update"]);
Route::get('/transaksi/delete/{id}',[TransaksiController::class, "transaksi_delete"]);
Route::get('/exporttransaksi',[TransaksiController::class, "transaksiExport"])->name('exporttransaksi');
Route::get('/welcome', function () {return view('welcome');});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
