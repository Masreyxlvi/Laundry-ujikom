<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
}
