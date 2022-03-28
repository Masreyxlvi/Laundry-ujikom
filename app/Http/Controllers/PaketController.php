<?php

namespace App\Http\Controllers;

use App\Exports\PaketExport;
use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Imports\OutletImport;
use App\Imports\PaketImport;
use App\Models\outlet;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paket.index',[
            'pakets' => Paket::all(),
            // 'outlets' => outlet::all(),
            'users' => User::where('id' , auth()->user()->id)->get(),
            'title' => 'Paket'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paket.create',[
            'outlets' => outlet::all()
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
        $validate = $request->validate([
            'outlet_id' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);
        // dd($validate);
        // $validate['outlet_id'] = ;

        Paket::create($validate);

        return redirect('/paket')->with('succes', 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *  @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $validate = $request->validate([
            'outlet_id' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);
        // dd($validate);

        Paket::where('id', $paket->id)
                    ->update($validate);

        return redirect('/paket')->with('succes', 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);

        return redirect('/paket')->with('succes', 'Data Has Been Deleted!!');
    }

    public function Pdf(paket $paket)
    {
        $paket = paket::all();

        $pdf = Pdf::loadView('dashboard.paket.exportPDF',[
            'paket' => $paket
        ]);

        return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new PaketExport, 'paket.xlsx');
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
		Excel::import(new PaketImport, public_path('/file/'.$nama_file));
 
		// alihkan halaman kembali
		return redirect('/paket')->with('succes', 'Import Has Been Succes');
    }

    public function downloadTemplate()
    {
        return response()->download(public_path('template\paket.xlsx'));
    }
}
