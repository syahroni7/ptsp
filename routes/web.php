<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * User
 */
Route::get('/users/data', [\App\Http\Controllers\DataUtama\UserController::class, 'index'])->name('user-data.index');
Route::post('/users/data/store', [\App\Http\Controllers\DataUtama\UserController::class, 'store'])->name('user-data.store');
Route::delete('/users/data/destroy/{user}', [\App\Http\Controllers\DataUtama\UserController::class, 'destroy'])->name('user-data.destroy');

/**
 * Roles
 */
Route::get('/users/roles', [\App\Http\Controllers\DataUtama\RoleController::class, 'index'])->name('user-roles.index');
Route::post('/users/roles/store', [\App\Http\Controllers\DataUtama\RoleController::class, 'store'])->name('user-roles.store');
Route::delete('/users/roles/destroy/{role}', [\App\Http\Controllers\DataUtama\RoleController::class, 'destroy'])->name('user-roles.destroy');

/**
 * Unit Pengolah
 */
Route::get('/unit-pengolah', [\App\Http\Controllers\DataUtama\UnitPengolahController::class, 'index'])->name('unit-pengolah.index');
Route::post('/unit-pengolah/store', [\App\Http\Controllers\DataUtama\UnitPengolahController::class, 'store'])->name('unit-pengolah.store');
Route::delete('/unit-pengolah/destroy/{unit}', [\App\Http\Controllers\DataUtama\UnitPengolahController::class, 'destroy'])->name('unit-pengolah.destroy');

/**
 * Jenis Layanan
 */
Route::get('/jenis-layanan', [\App\Http\Controllers\DataMaster\JenisLayananController::class, 'index'])->name('jenis-layanan.index');
Route::post('/jenis-layanan/store', [\App\Http\Controllers\DataMaster\JenisLayananController::class, 'store'])->name('jenis-layanan.store');
Route::delete('/jenis-layanan/destroy/{jenis}', [\App\Http\Controllers\DataMaster\JenisLayananController::class, 'destroy'])->name('jenis-layanan.destroy');

/**
 * Output Layanan
 */
Route::get('/output-layanan', [\App\Http\Controllers\DataMaster\OutputLayananController::class, 'index'])->name('output-layanan.index');
Route::post('/output-layanan/store', [\App\Http\Controllers\DataMaster\OutputLayananController::class, 'store'])->name('output-layanan.store');
Route::delete('/output-layanan/destroy/{jenis}', [\App\Http\Controllers\DataMaster\OutputLayananController::class, 'destroy'])->name('output-layanan.destroy');

/**
 * Daftar Layanan
 */
Route::get('/daftar-layanan', [\App\Http\Controllers\DataMaster\DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
Route::post('/daftar-layanan/store', [\App\Http\Controllers\DataMaster\DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
Route::delete('/daftar-layanan/destroy/{layanan}', [\App\Http\Controllers\DataMaster\DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');

/**
 * Master Syarat Layanan
 */
Route::get('/syarat-layanan/master', [\App\Http\Controllers\DataMaster\MasterSyaratLayananController::class, 'index'])->name('syarat-layanan-master.index');
Route::post('/syarat-layanan/master/store', [\App\Http\Controllers\DataMaster\MasterSyaratLayananController::class, 'store'])->name('syarat-layanan-master.store');
Route::delete('/syarat-layanan/master/destroy/{syarat}', [\App\Http\Controllers\DataMaster\MasterSyaratLayananController::class, 'destroy'])->name('syarat-layanan-master.destroy');
Route::get('/syarat-layanan/master/search', [\App\Http\Controllers\DataMaster\MasterSyaratLayananController::class, 'search'])->name('syarat-layanan-master.search');

/**
 * List Syarat Layanan
 */
Route::get('/syarat-layanan/list', [\App\Http\Controllers\DataMaster\ListSyaratLayananController::class, 'index'])->name('syarat-layanan-list.index');
Route::get('/syarat-layanan/list/fetch/{layanan}', [\App\Http\Controllers\DataMaster\ListSyaratLayananController::class, 'fetch'])->name('syarat-layanan-list.fetch');
Route::post('/syarat-layanan/list/store', [\App\Http\Controllers\DataMaster\ListSyaratLayananController::class, 'store'])->name('syarat-layanan-list.store');
Route::put('/syarat-layanan/list/put/{id_layanan}/{id_master_syarat_layanan}', [\App\Http\Controllers\DataMaster\ListSyaratLayananController::class, 'put'])->name('syarat-layanan-list.put');
Route::delete('/syarat-layanan/list/destroy/{id_layanan}/{id_master_syarat_layanan}', [\App\Http\Controllers\DataMaster\ListSyaratLayananController::class, 'destroy'])->name('syarat-layanan-list.destroy');

/**
 * Transaksi Pelayanan
 */
Route::get('/daftar-pelayanan/list/{status}', [\App\Http\Controllers\DataTransaksi\DaftarPelayananController::class, 'index'])->name('daftar-pelayanan.index');
Route::get('/daftar-pelayanan/create', [\App\Http\Controllers\DataTransaksi\DaftarPelayananController::class, 'create'])->name('daftar-pelayanan.create');
Route::get('/daftar-pelayanan/search', [\App\Http\Controllers\DataTransaksi\DaftarPelayananController::class, 'search'])->name('daftar-pelayanan.search');
Route::get('/daftar-pelayanan/fetch/{id_pelayanan}', [\App\Http\Controllers\DataTransaksi\DaftarPelayananController::class, 'fetch'])->name('daftar-pelayanan.fetch');
Route::post('/daftar-pelayanan/store', [\App\Http\Controllers\DataTransaksi\DaftarPelayananController::class, 'store'])->name('daftar-pelayanan.store');

/**
 * Experiment
 */
Route::get('/exp', function() {
    $usr = \App\Models\User::find(1);
    return $usr->getRoleNames();
});