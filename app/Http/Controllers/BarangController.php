<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Exports\BarangExport;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Imports\BarangImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
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
            'barangs' => Barang::all()
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
            'qty' => 'required',
            'harga' => 'required',
            'waktu_pembelian' => 'required',
            'status' => 'required',
            'supplier' => 'required',
        ]);

        Barang::create($validate);

        return redirect()->back()->with('succes', 'Data Has Been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $validate = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_pembelian' => 'required',
            'status' => 'required',
            'supplier' => 'required',
        ]);
        // dd($validate);

        Barang::where('id', $barang->id)
                    ->update($validate);

        return redirect('/barang')->with('succes', 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy( $barang->id);

        return redirect('/barang')->with('succes', 'Data Has Been Deleted!');
    }

    public function updateStatus(Request $request, Barang $barang)
    {
        $data = Barang::where('id',$request->id)->first();
        $data->status = $request->status;
        $data->updated_at = $request->update;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }
    public function export() 
    {
        return Excel::download(new BarangExport, 'Barang.xlsx');
    }

    public function downloadTemplate()
    {
        return response()->download(public_path('file\Barang.xlsx'));
    }

    public function import(Request $request) 
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$nama_file);
 
		// import data
		Excel::import(new BarangImport, public_path('/file/'.$nama_file));
      
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/barang')->with('succes', 'Import Has Been Succes');
    }
}
