<?php

namespace App\Http\Controllers;

use App\Surat;
use App\Suratkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use DataTables;
use Storage;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surat = \App\Surat::where('keterangan','belum terverifikasi')->get();
        return view('surats.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('surats.surat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
     {
        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            // 'no_surat'   => 'unique:suratmasuk|min:5',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ]);
        $surat = new Surat();
        $surat->no_surat          = $request->input('no_surat');
        $surat->lampiran          = $request->input('lampiran');
        $surat->tempat_surat      = $request->input('tempat_surat');
        $surat->tgl_surat         = $request->input('tgl_surat');
        $surat->perihal           = $request->input('perihal');
        $surat->tujuan_surat      = $request->input('tujuan_surat');
        $surat->salam_pembuka     = $request->input('salam_pembuka');
        $surat->isi               = $request->input('isi');
        $surat->hari_tgl          = $request->input('hari_tgl');
        $surat->waktu             = $request->input('waktu');
        $surat->tempat            = $request->input('tempat');
        $surat->salam_penutup     = $request->input('salam_penutup');
        $surat->keterangan        = 'belum terverifikasi';
        $surat->users_id = Auth::id();
        $surat->save();
        return back()->with("sukses", "Surat Berhasil di buat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.cetaksurat', ['surat' => $surat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            // 'no_surat'   => 'unique:suratmasuk|min:5',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ]);
        Surat::where('id',$id)->update(['keterangan'=>"terverifikasi"]);
        // $surat = Surat::find($id);
        // $surat_baru = new Suratkeluar();
        // $surat_baru->no_surat          = $surat->no_surat;
        // $surat_baru->lampiran          = $surat->lampiran;
        // $surat_baru->tempat_surat      = $surat->tempat_surat;
        // $surat_baru->tgl_surat         = $surat->tgl_surat;
        // $surat_baru->perihal           = $surat->perihal;
        // $surat_baru->tujuan_surat      = $surat->tujuan_surat;
        // $surat_baru->salam_pembuka     = $surat->salam_pembuka;
        // $surat_baru->isi               = $surat->isi ;
        // $surat_baru->hari_tgl          = $surat->hari_tgl;
        // $surat_baru->waktu             = $surat->waktu;
        // $surat_baru->tempat            = $surat->tempat;
        // $surat_baru->salam_penutup     = $surat->salam_penutup;
        // $surat_baru->keterangan        = $surat->keterangan;
        // $surat_baru->users_id = Auth::id();
        // $surat_baru->save();
        return redirect('surat')->with("sukses", "Data Berhasil di verifikasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        //
    }
}