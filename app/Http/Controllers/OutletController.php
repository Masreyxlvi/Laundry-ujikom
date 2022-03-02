<?php

namespace App\Http\Controllers;

use Session;
use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OutletExport;
use App\Imports\OutletImport;
use Maatwebsite\Excel\Facades\Excel;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.outlet.index',[
            'outlets' => outlet::all(),
            'title' => 'Outlet'
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
        Gate::authorize('management-outlet');

        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required'
        ]);
        // dd($validate);

        Outlet::create($validate);

        return redirect('/outlet')->with('succes', 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, outlet $outlet)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required'
        ]);
        // dd($validate);

        Outlet::where('id', $outlet->id)
                    ->update($validate);

        return redirect('/outlet')->with('succes', 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(outlet $outlet)
    {
        outlet::destroy($outlet->id);

        return redirect('/outlet')->with('succes', 'Data Has Been Deleted!!');
    }

    public function Pdf(outlet $outlet)
    {
        $outlet = outlet::all();

        $pdf = PDF::loadView('dashboard.outlet.exportPDF',[
            'outlet' => $outlet
        ]);

        return $pdf->stream();
    }

    public function export() 
    {
        return Excel::download(new OutletExport, 'outlet.xlsx');
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
		Excel::import(new OutletImport, public_path('/file/'.$nama_file));
 
		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/member')->with('succes', 'Import Has Been Succes');
    }
     
}
