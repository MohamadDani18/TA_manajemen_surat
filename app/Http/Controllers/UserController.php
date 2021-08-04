<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\User;
use SweetAlert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \App\User::where('role','pegawai')->get();
        return view('users.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit_kerja= \App\Unitkerja::all();
        return view('users.create', compact('unit_kerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
            'mimes' => 'format gambar yang anda masukan salah!!!',
        ];

        $request->validate([
            'email'   => 'required|unique:users',
        ],$messages);

        $user = new User;
        $user->name= $request->name;
        $user->unit_kerja= $request->unit_kerja;
        $user->email= $request->email;
        $user->role= $request->role;
        $user->password= bcrypt($request->password);

        $user->save();

        return redirect('user')->with('sukses','Data berhasil di simpan !');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->get();
        $unit_kerja= \App\Unitkerja::all();
        return view('users.edit', ['user' => $user, 'unit_kerja' => $unit_kerja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $messages = [
        //     'required' => ':attribute wajib diisi!!!',
        //     'min' => ':attribute harus diisi minimal :min karakter!!!',
        //     'max' => ':attribute harus diisi maksimal :max karakter!!!',
        //     'unique' => ':attribute sudah ada!!!',
        //     'mimes' => 'format gambar yang anda masukan salah!!!',
        // ];

        // $request->validate([
        //     'email'   => 'required|unique:users',
        // ],$messages);

        $user = User::findOrFail($id);

        $user->name= $request->name;
        $user->unit_kerja= $request->unit_kerja;
        $user->email= $request->email;
        $user->role= $request->role;
        $user->password= bcrypt($request->password);

        $user->save();

        return redirect('user')->with('sukses', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('success', 'Data berhasil di delete !');
    }
}
