<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\outlet;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.index',[
            'title' =>'Transaksi',
            'pakets' => Paket::all(),
            'members' => Member::all(),
            'outlets' => outlet::all(),
            'users' => User::where('id' , auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $d = Transaksi::orderBy('id', 'desc')->first();
        // $urutan = ($d == null?1:substr($d->kode_invoice,5,6)+1);

        // $kode_invoice = sprintf('GL' .date('Y') .'%05d' ,$urutan); 

        // dd($kode_invoice);
        $validate = $request->validate([
            'outlet_id' => 'required',
            'member_id' => 'required',
            'paket_id' => 'required',
            'tgl' => 'required|date',
            'tgl_bayar' => 'nullable',
            'batas_waktu' => 'nullable|date',
            'diskon' => 'nullable',
            'pajak' => 'nullable',
            'biaya_tambahan' => 'nullable',
            'status' => 'required',
            'dibayar' => 'required',
            'keterangan' => 'nullable',
            'qty' => 'required',
        ]);
        $validate['user_id'] = Auth::id();
        $validate['kode_invoice'] = Transaksi::get_code($validate);

        // dd($validate);
        $input_transkasi =  Transaksi::create($validate);

        $paket_id = $request->paket_id;
        $qty = $request->qty;
        $harga = $request->harga;
        $keterangan = $request->keterangan;
        // $sub_total = $harga*$qty;
        // $sub_total = $request->sub_total;

        foreach($paket_id as $i => $v){
           $validate['transaksi_id'] = $input_transkasi->id;
           $validate['paket_id'] = $paket_id[$i];
           $validate['qty'] = $qty[$i];
           $validate['keterangan'] = $keterangan[$i];
        //    $sub_total = $sub_total[$i];
            
           $input_detail_pembelian =  Detail_Transaksi::create($validate);
        //    dd($validate);
         }
        return redirect('/transaksi/faktur/'.$input_transkasi->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
   
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faktur(Request $request,Transaksi $transaksi, $id)
    {
        // $transaksi->load(['member','DetailTransaksi']); 
        // $data['transaksi'] = $transaksi; 
        // dd($transaksi);
        $data = array(
            'transaksi' => Transaksi::find($id),
            'title' => 'Faktur'
        );
        $transaksi->load(['member','DetailTransaksi']);
        return view('dashboard.transaksi.faktur')->with($data);
    }
}

