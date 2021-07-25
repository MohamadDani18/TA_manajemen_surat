<?php

namespace App\Http\Controllers;

use App\Suratkeluar;
use App\Suratmasuk;
use App\Klasifikasi;
use App\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use DataTables;
use Storage;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suratkeluar = \App\Surat::where('keterangan','terverifikasi')->get();
        return view('SuratKeluar.index', ['suratkeluar' => $suratkeluar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_klasifikasi = Klasifikasi::all();
        return view('SuratKeluar.create', ['data_klasifikasi' => $data_klasifikasi]);
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
        $surat = new Suratkeluar();
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
        $surat->keterangan        = $request->input('keterangan');
        $surat->users_id = Auth::id();
        $surat->save();
        return back()->with("sukses", "Surat Berhasil di verifikasi");

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suratkeluar  $suratkeluar
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
     * @param  \App\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil relasi Klasifikasi
        $data_klasifikasi = Klasifikasi::all();
        $suratkeluar = Suratkeluar::where('id',$id)->get();
        return view('SuratKeluar.edit', ['suratkeluar' => $suratkeluar], ['data_klasifikasi' => $data_klasifikasi] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'min:5',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ],$messages);

        $surat = Surat::findOrFail($id);
        $surat->update($request->all());
        $surat->keterangan        = 'Belum Terverifikasi';
        $surat->save();
        return redirect('/permintaan-surat')->with("sukses", "Data telah di ubah");

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::destroy($id);
        return redirect('suratkeluar')->with('success', 'Data berhasil di delete !');
    }
}
