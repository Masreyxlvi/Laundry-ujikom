<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
// use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\outlet;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = null;

        if($request->has('status')) {
            $transaksi = Transaksi::where('status', $request->status)->get();
        }else{
            $transaksi = Transaksi::get();
        }
        $data = 'Transaksi';

        return view('dashboard.transaksi.index', [
            'title' =>'Transaksi',
            'transaksis' => $transaksi,
        ]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transaksi.create',[
            'title' =>'Transaksi',
            'pakets' => Paket::where('outlet_id', auth()->user()->outlet_id)->get(),
            'members' => Member::all(),
            'outlets' => outlet::all(),
            // 'users' => User::where('id' , auth()->user()->id)->get()
            'transaksis' => Transaksi::where('status', 'baru')->get()

        ]);
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
            'paket_id' => 'required|array',
            'tgl' => 'required|date',
            'tgl_bayar' => 'nullable',
            'batas_waktu' => 'nullable|date',
            'diskon' => 'nullable',
            'pajak' => 'nullable',
            'biaya_tambahan' => 'nullable',
            'status' => 'required',
            'dibayar' => 'nullable',
            'keterangan' => 'nullable',
            'qty' => 'required',
            'total' => 'required',
            'sub_total' => 'required',
        ]);
        $validate['user_id'] = Auth::id();
        $validate['kode_invoice'] = Transaksi::createInvoice();

        // dd($validate);
        $input_transkasi =  Transaksi::create($validate);

        $paket_id = $request->paket_id;
        $qty = $request->qty;
        $sub_total = $request->sub_total;
        $keterangan = $request->keterangan;
        // $sub_total = $harga*$qty;
        // $sub_total = $request->sub_total;

        foreach($paket_id as $i => $v){
           $validate['transaksi_id'] = $input_transkasi->id;
           $validate['paket_id'] = $paket_id[$i];
           $validate['qty'] = $qty[$i];
           $validate['sub_total'] = $sub_total[$i];
           $validate['keterangan'] = $keterangan[$i];
        //    $sub_total = $sub_total[$i];
            
           $input_detail_pembelian =  Detail_Transaksi::create($validate);
        //    dd($validate);
         }
         if($request->status == 'dibayar'){
             return redirect('/transaksi/faktur/'.$input_transkasi->id);
            }else{
                return redirect()->back()->with('succes', 'Transaksi Berhasil');
         }

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
    public function edit(Request $request, Transaksi $transaksi)
    {
      

        return view('dashboard.transaksi.update', [
            'transaksi' => $transaksi
        ]);
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
        $validate = $request->validate([
            // 'total' => 'required',
            'tgl_bayar' => 'required', 
            'diskon' => 'nullable',
            'pajak' => 'nullable',
            'biaya_tambahan' => 'nullable',
            'dibayar' => 'required'
        ]);

        Transaksi::where('id', $transaksi->id)
                        ->update($validate);
        return redirect()->back()->with('succes', 'Data Has Been Updated');
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
     * @param  \App\Models\Transaksi  $transaksi
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function faktur(Request $request,Transaksi $transaksi, $id)
    {
        $data = array(
            'transaksi' => Transaksi::find($id),
            'title' => 'Faktur'
        );
        $transaksi->load(['member','DetailTransaksi']);
        return view('dashboard.transaksi.faktur')->with($data);
    }
  
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPDF(Request $request, Transaksi $transaksi, $id) {
       
        $transaksi = Transaksi::find($id);
        // dd($data);
        $transaksi->load(['member','DetailTransaksi']);
        // dd($transaksi);
        $pdf = PDF::loadView('dashboard.transaksi.cetakPDF', compact('transaksi', $transaksi));

        return $pdf->stream();
        
      }
}

