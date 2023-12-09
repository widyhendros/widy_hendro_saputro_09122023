<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $pegawai = DB::table('users')->get();
    return view('data_diri.index',[
        'pegawai' => $pegawai
    ]);
});

Route::resource('datapegawai',App\Http\Controllers\DataPegawaiController::class);
