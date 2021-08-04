<?php

namespace App\Http\Controllers;

use App\Unitkerja;
use Illuminate\Http\Request;

class UnitkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitkerja = \App\Unitkerja::all();
        return view('unitkerja.index',['unitkerja'=> $unitkerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unitkerja.index');
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
            'unit_kerja' => 'unique:unitkerja',

        ]);
       $unitkerja = new Unitkerja();
       $unitkerja->unit_kerja   = $request->input('unit_kerja');
       $unitkerja->save();
       return redirect('unitkerja')->with("sukses", "Unit kerja Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unitkerja  $unitkerja
     * @return \Illuminate\Http\Response
     */
    public function show(Unitkerja $unitkerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unitkerja  $unitkerja
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $unit_kerja = \App\Unitkerja::find($id);
        return view('unitkerja.edit',['unit_kerja'=>$unit_kerja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unitkerja  $unitkerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unitkerja $unitkerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unitkerja  $unitkerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unitkerja $unitkerja)
    {
        //
    }
}
