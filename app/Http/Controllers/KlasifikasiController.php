<?php

namespace App\Http\Controllers;

use App\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = \App\Klasifikasi::all();
        return view('klasifikasi.index',['klasifikasi'=> $klasifikasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'unique:klasifikasi|min:5',
            'kode' => 'unique:klasifikasi|max:2',
            'uraian' => 'min:5',
        ]);
       $klasifikasi = new Klasifikasi();
       $klasifikasi->nama   = $request->input('nama');
       $klasifikasi->kode   = $request->input('kode');
       $klasifikasi->uraian = $request->input('uraian');
       $klasifikasi->save();
       return redirect('klasifikasi')->with("sukses", "Data Klasifikasi Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Klasifikasi $klasifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $klasifikasi = \App\Klasifikasi::find($id);
        return view('klasifikasi.edit',['klasifikasi'=>$klasifikasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        $request->validate([
            'nama' => 'min:5',
            'kode' => 'max:2',
            'uraian' => 'min:5',
        ]);
        $klasifikasi = \App\Klasifikasi::find($id);
        $klasifikasi->update($request->all());
        $klasifikasi->save();
        return redirect('klasifikasi') ->with('sukses','Data Klasifikasi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Klasifikasi::destroy($id);
        return redirect('klasifikasi')->with('success', 'Data berhasil di delete !');
    }
}
