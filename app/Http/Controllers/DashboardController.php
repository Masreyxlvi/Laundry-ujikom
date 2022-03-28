<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //  menampilkan halaman Dashboard 
    // dengan menmpilkan total pendapatan , total transaksi, jumlah data paket dan member
    public function index()
    {
        $total = Transaksi::where('tgl', date('Y-m-d'))->get()->sum('total');
        $paket = Paket::get()->count('id');
        $member = Member::get()->count('id');
        $transaksi = Transaksi::where('tgl', date('Y-m-d'))->get()->count('id');
        return view('dashboard.index' , compact('total',$total,'paket',$paket,'member', $member,'transaksi', $transaksi), [
            'title' => 'Dashboard',
        ]);
    }     
}
