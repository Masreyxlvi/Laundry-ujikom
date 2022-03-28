<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    
    public function index()
    {
        return view('dashboard.simulasi.index', [
            'title' => 'Simulasi'
        ]);
    }
    public function buku()
    {
        return view('dashboard.simulasi.test2', [
            'title' => 'Simulasi'
        ]);
    }
    public function gaji()
    {
        return view('dashboard.simulasi.to', [
            'title' => 'Simulasi'
        ]);
    }
    public function barang()
    {
        return view('dashboard.simulasi.barang', [
            'title' => 'Simulasi'
        ]);
    }
    public function transaksi()
    {
        return view('dashboard.simulasi.transaksi', [
            'title' => 'Simulasi'
        ]);
    }
}
