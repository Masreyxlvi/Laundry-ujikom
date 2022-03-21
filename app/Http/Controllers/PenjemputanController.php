<?php

namespace App\Http\Controllers;

use App\Exports\PenjemputanExport;
use App\Models\Penjemputan;
use App\Http\Requests\StorePenjemputanRequest;
use App\Http\Requests\UpdatePenjemputanRequest;
use App\Imports\PenjemputanImport;
use App\Models\Logging;
use App\Models\Member;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.penjemputan.index',[
            'title' => 'Penjemputan',
            'penjemputans' => Penjemputan::all(),
            'members' => Member::all(),
            'loggings' => Logging::all()
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
            'member_id' => 'required',
            'petugas' => 'required',
            'status' => 'required',
        ]);
        // dd($validate);

        Penjemputan::create($validate);

        return redirect('/penjemputan')->with('succes', 'Data Has Been Created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjemputan $penjemputan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjemputan $penjemputan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *  @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjemputan $penjemputan)
    {
        $validate = $request->validate([
            'member_id' => 'required',
            'petugas' => 'required',
            'status' => 'required',
        ]);
        // dd($validate);

        Penjemputan::where('id', $penjemputan->id)
                    ->update($validate);

        return redirect('/penjemputan')->with('succes', 'Data Has Been Updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjemputan $penjemputan)
    {
        Penjemputan::destroy($penjemputan->id);

        return redirect('/penjemputan')->with('succes', 'Data Has Been Deleted!');
    }
    
    public function updateStatus(Request $request, Penjemputan $penjemputan)
    {
        $data = Penjemputan::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }

    public function Pdf(Penjemputan $penjemputan)
    {
        $penjemputan = Penjemputan::all();

        $penjemputan->load(['member']);
        $pdf = Pdf::loadView('dashboard.Penjemputan.exportPDF', compact('penjemputan', $penjemputan));

        return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new PenjemputanExport, 'penjemputan.xlsx');
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
		Excel::import(new PenjemputanImport, public_path('/file/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/penjemputan')->with('succes', 'Import Has Been Succes');
    }
     
}
