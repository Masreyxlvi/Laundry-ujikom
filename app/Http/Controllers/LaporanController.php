<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function laporan()
    {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Transaksi::whereBetween('tgl',[$start_date,$end_date])->get();
        } else {
            $data = Transaksi::latest()->get();
        }
        
        return view('dashboard.laporan.index',[
            'transaksis' => $data,
            'users' => User::where('id' , auth()->user()->id)->get(),
            'title' => 'Laporan'
        ]);
    }

   
}
