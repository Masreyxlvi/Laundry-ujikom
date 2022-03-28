<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * menampilkan halaman Member
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.member.index',[
            'members' => Member::all(),
            'title' => 'Member'
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
     *melakukan validasi data yang ada pada $request
     * dan di simpan data ke database 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Member::create($validate);

        return redirect('/member')->with('succes', 'Data Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * melakukan perubahan data sesuai id yang dipilih
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Member::where('id', $member->id)
                        ->update($validate);

        return redirect('/member')->with('succes', 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     * menghapus data sesuai id yang dipilih
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        
        return redirect('/member')->with('succes', 'Data Has Been Deleted!');
    }
}
