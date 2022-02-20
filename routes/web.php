<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    $total = Transaksi::where('tgl', date('Y-m-d'))->get()->sum('total');
    $paket = Paket::get()->count('id');
    $member = Member::get()->count('id');
    $transaksi = Transaksi::where('tgl', date('Y-m-d'))->get()->count('id');
    return view('dashboard.index' , compact('total',$total,'paket',$paket,'member', $member,'transaksi', $transaksi), [
        'title' => 'Dashboard',
    ]);
});

// Route::get('transaksi/update')
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/laporan/dipenuhi' , [TransaksiController::class,  'updateDipenuhi'])->name('dipenuhi');

Route::get('/laporan', [LaporanController::class, 'laporan'])->middleware('role:admin,kasir');    

Route::resource('/outlet', OutletController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/paket', PaketController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/member', MemberController::class)->except('create', 'edit', 'show')->middleware('role:admin,kasir');
Route::resource('/register', RegisterController::class)->middleware('role:admin');  
Route::resource('/transaksi', TransaksiController::class)->middleware('role:admin,kasir');

Route::get('/transaksi/faktur/{faktur}', [TransaksiController::class, 'faktur']);

Route::get('/transaksi/cetak_pdf/{cetak_pdf}', [TransaksiController::class, 'exportPDF']);    