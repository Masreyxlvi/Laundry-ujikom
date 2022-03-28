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
     * menampilkan halaman utama Barang Inventasi
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang_inventaris.index',[
            'title' => 'Barang Inventaris',
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
     * melakukan validasi data yang ada pada $request
     * dan di simpan data ke database 
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
        Barang_Inventaris::create($validate);

        return redirect('/barang_inventaris')->with('succes', 'Data Has Been Created!');
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
     * melakukan perubahan data sesuai id yang dipilih
      *  @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_Inventaris  $barang_Inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_Inventaris $b, $id)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);
        $b = Barang_Inventaris::find($id);
        Barang_Inventaris::where('id', $b->id)
                                 ->update($validate);

        return redirect('/barang_inventaris')->with('succes', 'Data Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     * menghapus data sesuai id yang dipilih
     * @param  \App\Models\Barang_Inventaris  $barang_Inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_Inventaris $b, $id)
    {
        $b = Barang_Inventaris::find($id);
        Barang_Inventaris::destroy($b->id);

        return redirect('/barang_inventaris')->with('succes', 'Data Has Been Deleted!!');
    }
}
