<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use App\Models\User;

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

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'users' => User::where('id', auth()->user()->id)->get()
    ]);
});

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/laporan/dipenuhi' , [TransaksiController::class,  'updateDipenuhi'])->name('dipenuhi');

Route::get('/laporan', [LaporanController::class, 'laporan'])->middleware('auth');    

Route::resource('/outlet', OutletController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/paket', PaketController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/member', MemberController::class)->except('create', 'edit', 'show')->middleware('auth');
Route::resource('/register', RegisterController::class)->middleware('auth');
Route::resource('/transaksi', TransaksiController::class)->middleware('auth');
