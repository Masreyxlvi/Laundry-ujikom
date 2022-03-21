<?php

use App\Http\Controllers\BarangInventarisController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\TransaksiController;
use App\Models\Member;
use App\Models\Outlet;
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

});

// Route::get('/simulasi', function() {
//     return view('dashboard.simulasi.index', [
//         'title' => 'Simulasi'
//     ]);
// });
Route::get('/simulasi', [SimulasiController::class, 'index'])->name('simulasi')->middleware('role:admin');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/laporan/dipenuhi' , [TransaksiController::class,  'updateDipenuhi'])->name('dipenuhi');
Route::post('/status', [PenjemputanController::class ,'updateStatus'])->name('status');

Route::get('/laporan', [LaporanController::class, 'laporan'])->middleware('role:admin,kasir');    

Route::resource('/outlet', OutletController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/paket', PaketController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/barang', BarangInventarisController::class)->except('create', 'edit', 'show')->middleware('can:admin');
Route::resource('/member', MemberController::class)->except('create', 'edit', 'show')->middleware('role:admin,kasir');
Route::resource('/penjemputan', PenjemputanController::class)->except('create', 'edit', 'show')->middleware('role:admin,kasir');
Route::resource('/register', RegisterController::class)->middleware('role:admin');  
Route::resource('/transaksi', TransaksiController::class)->middleware('role:admin,kasir');

Route::get('/transaksi/faktur/{faktur}', [TransaksiController::class, 'faktur']);
    
Route::get('/transaksi/cetak_pdf/{cetak_pdf}', [TransaksiController::class, 'exportPDF']);    
Route::get('/outlet/cetak_pdf/', [OutletController::class, 'PDF']);    
Route::get('/penjemputan/cetak_pdf/', [PenjemputanController::class, 'Pdf']);    

Route::get('/outlet/export_excel/', [OutletController::class, 'export']);    
Route::get('/paket/export_excel/', [PaketController::class, 'export']);    
Route::get('/penjemputan/export_excel/', [PenjemputanController::class, 'export']);    


Route::post('/outlet/import', [OutletController::class, 'import']);
Route::post('/penjemputan/import', [PenjemputanController::class, 'import']);