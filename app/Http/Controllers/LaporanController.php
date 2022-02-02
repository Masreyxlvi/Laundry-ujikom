<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        return view('dashboard.laporan.index',[
            'transaksis' => Transaksi::all(),
            'users' => User::where('id' , auth()->user()->id)->get(),
            'title' => 'Laporan'
        ]);
    }
}
