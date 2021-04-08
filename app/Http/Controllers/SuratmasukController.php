<?php

namespace App\Http\Controllers;

use App\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SweetAlert;
use DataTables;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuratMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suratmasuk $suratmasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suratmasuk $suratmasuk)
    {
        //
    }
}
