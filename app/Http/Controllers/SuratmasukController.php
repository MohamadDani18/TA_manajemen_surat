<?php

namespace App\Http\Controllers;

use App\Suratmasuk;
use App\Jenissurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use DataTables;
use Storage;
use PDF;
use File;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disp = \App\Disposisi::all();

        $data_suratmasuk = \App\SuratMasuk::all();

        return view('SuratMasuk.index',['data_suratmasuk'=> $data_suratmasuk],['disposisi'=> $disp]);
    }

    //function untuk masuk ke view Tambah
    public function create()
    {
        $data_klasifikasi = \App\Klasifikasi::all();
        return view('SuratMasuk.create', ['data_klasifikasi' => $data_klasifikasi]);
    }

    //function untuk tambah
     public function store (Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',
            'mimes' => 'format file yang anda masukan salah!!!',
        ];

        $request->validate([
            'filemasuk'  => 'mimes:pdf,jpg,jpeg,pdf,doc,docx',
            'no_surat'   => 'required|unique:suratmasuk|min:5',
            'isi'        => 'min:5',
            'keterangan' => 'min:5',
        ],$messages);
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_surat   = $request->input('no_surat');
        $suratmasuk->asal_surat = $request->input('asal_surat');
        $suratmasuk->isi        = $request->input('isi');
        $suratmasuk->kode       = $request->input('kode');
        $suratmasuk->tgl_surat  = $request->input('tgl_surat');
        $file                   = $request->file('filemasuk');
        $fileName   = 'suratMasuk-'. $file->getClientOriginalName();
        $file->move('datasuratmasuk/', $fileName);
        $suratmasuk->filemasuk  = $fileName;
        $suratmasuk->users_id = Auth::id();
        $suratmasuk->save();
        return redirect('suratmasuk')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

     }

    //function untuk melihat file
    public function show($id)
    {
        $suratmasuk = Suratmasuk::where('id',$id)->get();
        return view('SuratMasuk.detail', ['suratmasuk' => $suratmasuk]);
    }

    // //function untuk download file
    // public function downfunc(){

    //     $downloads=DB::table('suratmasuk')->get();
    //     return view('suratmasuk.tampil',compact('downloads'));
    // }

    // public function agendamasukdownload_excel(){
    //     $suratmasuk = \App\SuratMasuk::select('id', 'isi', 'asal_surat', 'kode', 'no_surat', 'tgl_surat', 'tgl_terima', 'keterangan')->get();
    //     return Excel::create('Agenda_Surat_Masuk', function($excel) use ($suratmasuk){
    //         $excel->sheet('Agenda_Surat_Masuk',function($sheet) use ($suratmasuk){
    //             $sheet->fromArray($suratmasuk);
    //         });
    //     })->download('xls');
    // }

    //function untuk masuk ke view edit
    public function edit ($id)
    {
        $data_klasifikasi = \App\Klasifikasi::all();
        $suratmasuk = \App\Suratmasuk::find($id);
        return view('SuratMasuk.edit',['suratmasuk'=>$suratmasuk],['data_klasifikasi'=>$data_klasifikasi]);
    }
    public function update (Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal :min karakter!!!',
            'max' => ':attribute harus diisi maksimal :max karakter!!!',
            'unique' => ':attribute sudah ada!!!',

        ];

        $request->validate([
            'filemasuk'  => 'mimes:jpg,jpeg,png,pdf,doc,docx',
            'no_surat'   => 'required|min:5',
            'isi'        => 'min:5',
            'keterangan' => 'min:5',
        ],$messages);

        $suratmasuk = Suratmasuk::findOrFail($id);
        $suratmasuk->update($request->all());
        //Untuk Update File
        if($request->hasFile('filemasuk')){
            $request->file('filemasuk')->move('datasuratmasuk/','suratMasuk-'. $request->file('filemasuk')->getClientOriginalName());
            $suratmasuk->filemasuk = 'suratMasuk-'. $request->file('filemasuk')->getClientOriginalName();
            $suratmasuk->save();
        }

        return redirect()->route('suratmasuk.index')->with('sukses','surat masuk berhasil di update');
    }

    //function untuk hapus
    public function destroy($id)
    {
        $suratmasuk = Suratmasuk::findorfail($id);
        File::delete($suratmasuk['filemasuk']);
        $suratmasuk->delete();

        return redirect('suratmasuk')->with('sukses', 'Data Surat Masuk Berhasil Dihapus');
    }

    public function cetakLaporan()
    {
        // $jenissurat = Jenissurat::all();
        $suratmasuk = Suratmasuk::get();
        return view('SuratMasuk.cetak-laporan', compact('suratmasuk'));
    }

    public function cetakForm()
    {
        return view('SuratMasuk.cetak-laporan-form');
    }

    public function cetakLaporanFilter($tglawal, $tglakhir)
    {
        // $messages = [
        //     'required' => ':attribute wajib diisi!!!',
        //     'min' => ':attribute harus diisi minimal :min karakter!!!',
        //     'max' => ':attribute harus diisi maksimal :max karakter!!!',
        //     'unique' => ':attribute sudah ada!!!',

        // ];

        // $request->validate([
        //     'tgl_awal' => 'required',
        //     'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
        // ],$messages);
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $suratmasuk = Suratmasuk::get()->whereBetween('tgl_surat', [$tglawal, $tglakhir]);
        return view('SuratMasuk.cetak-laporan', compact('suratmasuk'));
    }

}
