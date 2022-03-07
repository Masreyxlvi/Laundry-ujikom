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
}
