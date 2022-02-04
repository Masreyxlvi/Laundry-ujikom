<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.index',[
            'users' => User::all(),
            'outlets' => outlet::all(),
            'title' => 'Profil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profil.create',[
            'title' => 'User',
            'outlets' => outlet::all(),
            'users' => User::where('id' , auth()->user()->id)->get()
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'outlet_id' => 'required',
            'role' => 'required',
            'password' => 'required|min:5',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        // dd($validate);

        User::create($validate);

        return redirect('/register')->with('succes', 'User Has Been Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profil.edit', [
            'title' => 'User',
            'user' => $user,
            'outlets' => outlet::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $user)
    {
        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);
        
        if($request->password != ' '){
            $validate['password'] = Hash::make($request->password);
        }

        // dd($validate);
        User::where('id' , $user->id)
                    ->update($validate);
        
        return redirect()->back()->with('succes', 'Data Has Been Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
