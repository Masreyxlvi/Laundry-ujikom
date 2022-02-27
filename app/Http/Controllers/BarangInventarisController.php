<?php

namespace App\Http\Controllers;

use App\Models\Barang_Inventaris;
use App\Http\Requests\StoreBarang_InventarisRequest;
use App\Http\Requests\UpdateBarang_InventarisRequest;
use Illuminate\Http\Request;

class BarangInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang.index',[
            'title' => 'Barang',
            'barang_inventaris' => Barang_Inventaris::all()
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
        $validate = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);
        // dd($validate);
        // $validate['outlet_id'] = ;

        Barang_Inventaris::create($validate);

        return redirect('/barang')->with('succes', 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_Inventaris  $barang_Inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_Inventaris $barang_Inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
      *  @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_Inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Barang_Inventaris $barang)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
      *  @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_Inventaris  $barang_Inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_Inventaris $barang)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);
        // dd($validate);
        // $validate['outlet_id'] = ;

        Barang_Inventaris::where('id', $barang->id)
                                 ->update($validate);

        return redirect('/barang')->with('succes', 'Data Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_Inventaris  $barang_Inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_Inventaris $barang)
    {
        Barang_Inventaris::destroy($barang->id);

        return redirect('/barang')->with('succes', 'Data Has Been Deleted!!');
    }
}
