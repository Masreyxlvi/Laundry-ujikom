<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    //  menampilkan halaman Laporan 
    // dengan menmpilkan data detail transaksi dan total pendapatan
    public function laporan()
    {
        $total = Transaksi::get()->sum('total');
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $transaksi = Transaksi::whereBetween('tgl',[$start_date,$end_date])->get();
        } else {
            $transaksi = Transaksi::latest()->get();
        }

        return view('dashboard.laporan.index', compact('total', $total), [
            'title' => 'Laporan',
            'transaksis' => $transaksi
        ]);
    }

   
}
