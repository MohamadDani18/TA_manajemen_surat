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
use DateTime;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $surat = \App\Surat::where('keterangan','belum terverifikasi')->get();
        // return view('surats.index', compact('surat'));
    }

    public function verifikasi(Request $request)
    {
        $surat = \App\Surat::where('keterangan','belum terverifikasi')->orderBy('id','DESC')->get();

        return view('surats.index', compact('surat'));
    }

    public function surats(Request $request)
    {
        $surat = \App\Surat::where('keterangan','ditolak')->orWhere('keterangan','belum terverifikasi')->orderBy('id','DESC')->get();
        return view('surats.permintaan', compact('surat'));
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

    public function edaran()
    {
        return view('surats.edaran.create');
    }

    public function permohonan()
    {
        return view('surats.permohonan.create');
    }

    public function perintah()
    {
        return view('surats.perintah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'required|unique:buatsurat|min:5',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ],$messages);

        $surat = $request->input();
        $surat = new Surat();
        $surat->no_surat          = $request->input('no_surat');
        $surat->lampiran          = $request->input('lampiran');
        $surat->tempat_surat      = 'Tegal';
        $surat->tgl_surat         = new DateTime();
        $surat->perihal           = $request->input('perihal');
        $surat->tujuan_surat      = $request->input('tujuan_surat');
        $surat->salam_pembuka     = $request->input('salam_pembuka');
        $surat->isi               = $request->input('isi');
        $surat->hari_tgl          = $request->input('hari_tgl');
        $surat->waktu             = $request->input('waktu');
        $surat->tempat            = $request->input('tempat');
        $surat->salam_penutup     = $request->input('salam_penutup');
        $surat->tembusan1         = $request->input('tembusan1');
        $surat->tembusan2         = $request->input('tembusan2');
        $surat->tembusan3         = $request->input('tembusan3');
        $surat->keterangan        = 'belum terverifikasi';
        $surat->jenis_surat        = 'surat undangan';
        //
        $surat['tembusan1'] = implode("br",$surat['tembusan1']);

        $surat->users_id = Auth::id();
        $surat->save();
        return back()->with("sukses", "Surat Berhasil di buat");
    }

    public function tambahperintah (Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
            'numeric' => ':attribute harus angka!!!',
        ];

        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'required|unique:buatsurat|min:5',
            'nip' => 'required|numeric',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ],$messages);

        $surat = new Surat();
        $surat->no_surat          = $request->input('no_surat');
        // $surat->lampiran          = $request->input('lampiran');
        $surat->tempat_surat      = 'Tegal';
        $surat->tgl_surat         = new DateTime();
        // $surat->perihal           = $request->input('perihal');
        // $surat->tujuan_surat      = $request->input('tujuan_surat');
        $surat->salam_pembuka     = $request->input('salam_pembuka');
        $surat->isi               = $request->input('isi');
        $surat->nama              = $request->input('nama');
        $surat->nip               = $request->input('nip');
        $surat->unitkerja         = $request->input('unitkerja');
        $surat->tugas             = $request->input('tugas');
        $surat->waktu             = $request->input('waktu');
        $surat->tempat            = $request->input('tempat');
        $surat->salam_penutup     = $request->input('salam_penutup');
        $surat->tembusan1         = $request->input('tembusan1');
        $surat->tembusan2         = $request->input('tembusan2');
        $surat->tembusan3         = $request->input('tembusan3');
        $surat->keterangan        = 'belum terverifikasi';
        $surat->jenis_surat       = 'surat perintah';
        $surat->tujuan_surat      = '-';
        $surat->perihal           = '-';
        $surat->users_id = Auth::id();
        $surat->save();
        return back()->with("sukses", "Surat Berhasil di buat");
    }

    public function tambahedaran (Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'required|unique:buatsurat',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ],$messages);

        $surat = new Surat();
        $surat->no_surat          = $request->input('no_surat');
        $surat->lampiran          = $request->input('lampiran');
        $surat->tempat_surat      = 'Tegal';
        $surat->tgl_surat         = new DateTime();
        $surat->perihal           = $request->input('perihal');
        $surat->tujuan_surat      = $request->input('tujuan_surat');
        $surat->salam_pembuka     = $request->input('salam_pembuka');
        $surat->isi               = $request->input('isi');
        $surat->isi1              = $request->input('isi1');
        $surat->isi2              = $request->input('isi2');
        $surat->isi3              = $request->input('isi3');
        $surat->salam_penutup     = $request->input('salam_penutup');
        $surat->tembusan1         = $request->input('tembusan1');
        $surat->tembusan2         = $request->input('tembusan2');
        $surat->tembusan3         = $request->input('tembusan3');
        $surat->keterangan        = 'belum terverifikasi';
        $surat->jenis_surat        = 'surat edaran';
        $surat->users_id = Auth::id();
        $surat->save();
        return back()->with("sukses", "Surat Berhasil di buat");
    }

    public function tambahpermohonan (Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $request->validate([
            // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'required|unique:buatsurat',
            // 'isi'        => 'min:5',
            // 'keterangan' => 'min:5',
        ],$messages);

        $surat = new Surat();
        $surat->no_surat          = $request->input('no_surat');
        $surat->lampiran          = $request->input('lampiran');
        $surat->tempat_surat      = 'Tegal';
        $surat->tgl_surat         = new DateTime();
        $surat->perihal           = $request->input('perihal');
        $surat->tujuan_surat      = $request->input('tujuan_surat');
        $surat->salam_pembuka     = $request->input('salam_pembuka');
        $surat->isi               = $request->input('isi');
        $surat->isi1              = $request->input('isi1');
        $surat->salam_penutup     = $request->input('salam_penutup');
        $surat->tembusan1         = $request->input('tembusan1');
        $surat->tembusan2         = $request->input('tembusan2');
        $surat->tembusan3         = $request->input('tembusan3');
        $surat->keterangan        = 'belum terverifikasi';
        $surat->jenis_surat        = 'surat permohonan';
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

    public function tampiledaran($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.edaran.cetaksurat', ['surat' => $surat]);
    }

    public function tampilpermohonan($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.permohonan.cetaksurat', ['surat' => $surat]);
    }

    public function tampilperintah($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.perintah.cetaksurat', ['surat' => $surat]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.edit', ['surat' => $surat]);
    }

    public function editedaran($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.edaran.edit', ['surat' => $surat]);
    }

    public function editpermohonan($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.permohonan.edit', ['surat' => $surat]);
    }

    public function editperintah($id)
    {
        $surat = Surat::where('id',$id)->get();
        return view('surats.perintah.edit', ['surat' => $surat]);
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
            $messages = [
                'min' => ':attribute harus diisi minimal :min karakter!!!',
                'max' => ':attribute harus diisi maksimal :max karakter!!!',
                'unique' => ':attribute sudah ada!!!',
            ];

            $request->validate([
                'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
                'no_surat'   => 'unique:buatsurat|min:5',
                'isi'        => 'min:5',
                'keterangan' => 'min:5',
            ],$messages);
        // Surat::where('id',$id)->update(['keterangan'=>"terverifikasi"]);
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
        $surat = Surat::findOrFail($id);
        $surat->update($request->all());
        $surat->save();
        return redirect('verifikasi')->with("sukses", "Data telah di konfirmasi");
    }

    // public function perbarui(Request $request, $id)
    // {
    //         $request->validate([
    //         // 'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
    //         // 'no_surat'   => 'unique:suratmasuk|min:5',
    //         // 'isi'        => 'min:5',
    //         // 'keterangan' => 'min:5',
    //     ]);
    //     $surat = Surat::findOrFail($id);
    //     $surat->update($request->all());
    //     $surat->keterangan        = 'Belum Terverifikasi';
    //     $surat->save();
    //     return redirect('/permintaan-surat')->with("sukses", "Data telah di ubah");
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::destroy($id);
        return redirect('suratkeluar')->with('success', 'Data berhasil di delete !');
    }
}
