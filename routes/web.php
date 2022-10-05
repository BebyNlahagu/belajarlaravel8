<?php

use App\Http\Controllers\EmployeeController;
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


Route::get('/pegawai',[EmployeeController::class,'index'])->name('pegawai');

Route::get('/tambah',[EmployeeController::class,'tambah'])->name('tambah');
Route::post('/insert',[EmployeeController::class,'insert'])->name('insert');

Route::get('/tampil/{id}',[EmployeeController::class,'tampil'])->name('tampil');
Route::post('/edit/{id}',[EmployeeController::class,'edit'])->name('edit');

Route::get('/hapus/{id}',[EmployeeController::class,'hapus'])->name('hapus');
