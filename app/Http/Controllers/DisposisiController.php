<?php

namespace App\Http\Controllers;

use App\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Suratkeluar;
use App\Suratmasuk;
use App\User;
use PDF;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SuratMasuk $suratmasuk)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $disp = DB::select('select * from disposisis where suratmasuk_id = ?', [$suratmasuk->id]);
        return view('disposisi.index', compact('smasuk','disp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SuratMasuk $suratmasuk)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $unit_kerja= \App\Unitkerja::all();
        return view('disposisi.create', compact('smasuk','unit_kerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SuratMasuk $suratmasuk)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $this->validate($request, [
            'tujuan'        => 'required',
            'isi'           => 'required',
            // 'sifat'         => 'required',
            'tgl_disp'   => 'required',
            'catatan'       => 'required',
        ]);

        $disp = Disposisi::create([
            'tujuan'          => $request->tujuan,
            'isi'             => $request->isi,
            // 'sifat'           => $request->sifat,
            'tgl_disp'     => $request->tgl_disp,
            'catatan'         => $request->catatan,
            'users_id'        => Auth::id(),
            'suratmasuk_id'   => $suratmasuk->id,
        ]);

        return redirect('suratmasuk')->with('sukses', 'Data Disposisi Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function show(Disposisi $disposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $suratmasuk, $id)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $disp = Disposisi::findorfail($id);
        $unit_kerja= \App\Unitkerja::all();
        return view('disposisi.edit', compact('disp','smasuk','unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $suratmasuk, $id)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $disp = Disposisi::findorfail($id);
        $this->validate($request, [
            'tujuan'        => 'required',
            'isi'           => 'required',
            // 'sifat'         => 'required',
            'tgl_disp'   => 'required',
            'catatan'       => 'required',
        ]);

        $disp_data = [
            'tujuan'        => $request->tujuan,
            'isi'           => $request->isi,
            // 'sifat'         => $request->sifat,
            'tgl_disp'   => $request->tgl_disp,
            'catatan'       => $request->catatan,
            'users_id'      => Auth::id(),
            'smasuk_id'     => $suratmasuk->id,
        ];

        $disp->update($disp_data);

        return redirect()->route('disposisi.index', [$smasuk])->with('sukses', 'Data Disposisi Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasuk $suratmasuk, $id)
    {
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $disp = Disposisi::findorfail($id);
        $disp->delete();

        return redirect()->back()->with('sukses','Disposisi Berhasil di Hapus');
    }

    public function cetak(SuratMasuk $suratmasuk, $id)
    {
        // $inst = Instansi::first();
        $smasuk = $suratmasuk->findorfail($suratmasuk->id);
        $disp = Disposisi::findorfail($id);
        $pdf = PDF::loadview('disposisi.cetak', compact('disp','smasuk'));
        return $pdf->stream();
    }
}
