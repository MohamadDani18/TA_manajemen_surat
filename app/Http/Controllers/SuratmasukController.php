<?php

namespace App\Http\Controllers;

use App\SuratMasuk;
use App\Jenissurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SweetAlert;
use DataTables;
use Storage;
use PDF;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_suratmasuk = \App\SuratMasuk::all();
        return view('SuratMasuk.index',['data_suratmasuk'=> $data_suratmasuk]);
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
        $request->validate([
            'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'unique:suratmasuk|min:5',
            'isi'        => 'min:5',
            'keterangan' => 'min:5',
        ]);
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_surat   = $request->input('no_surat');
        $suratmasuk->asal_surat = $request->input('asal_surat');
        $suratmasuk->isi        = $request->input('isi');
        $suratmasuk->kode       = $request->input('kode');
        $suratmasuk->tgl_surat  = $request->input('tgl_surat');
        $suratmasuk->tgl_terima = $request->input('tgl_terima');
        $suratmasuk->keterangan = $request->input('keterangan');
        $file                   = $request->file('filemasuk');
        $fileName   = 'suratMasuk-'. $file->getClientOriginalName();
        $file->move('datasuratmasuk/', $fileName);
        $suratmasuk->filemasuk  = $fileName;
        $suratmasuk->users_id = Auth::id();
        $suratmasuk->save();
        return redirect('suratmasuk')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

     }

    //function untuk melihat file
    public function show($id_suratmasuk)
    {
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('SuratMasuk.detail',['suratmasuk'=>$suratmasuk]);
    }

    //function untuk download file
    public function downfunc(){

        $downloads=DB::table('suratmasuk')->get();
        return view('suratmasuk.tampil',compact('downloads'));
    }

    public function agendamasukdownload_excel(){
        $suratmasuk = \App\SuratMasuk::select('id', 'isi', 'asal_surat', 'kode', 'no_surat', 'tgl_surat', 'tgl_terima', 'keterangan')->get();
        return Excel::create('Agenda_Surat_Masuk', function($excel) use ($suratmasuk){
            $excel->sheet('Agenda_Surat_Masuk',function($sheet) use ($suratmasuk){
                $sheet->fromArray($suratmasuk);
            });
        })->download('xls');
    }

    //function untuk masuk ke view edit
    public function edit ($id_suratmasuk)
    {
        $data_klasifikasi = \App\Klasifikasi::all();
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('SuratMasuk.edit',['suratmasuk'=>$suratmasuk],['data_klasifikasi'=>$data_klasifikasi]);
    }
    public function update (Request $request, $id_suratmasuk)
    {
        $request->validate([
            'filemasuk' => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat' => 'min:5',
            'isi' => 'min:5',
            'keterangan' => 'min:5',
        ]);
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        $suratmasuk->update($request->all());
        //Untuk Update File
        if($request->hasFile('filemasuk')){
            $request->file('filemasuk')->move('datasuratmasuk/','suratMasuk-'. $request->file('filemasuk')->getClientOriginalName());
            $suratmasuk->filemasuk = 'suratMasuk-'. $request->file('filemasuk')->getClientOriginalName();
            $suratmasuk->save();
        }

        return redirect('suratmasuk') ->with('sukses','Data Surat Masuk Berhasil Diedit');
    }

    //function untuk hapus
    public function destroy($id)
    {
        SuratMasuk::destroy($id);
        return redirect('suratmasuk')->with('sukses', 'Data Surat Masuk Berhasil Dihapus');
    }

    public function cetakLaporan()
    {
        $jenissurat = Jenissurat::all();
        $suratmasuk = Suratmasuk::get();
        return view('SuratMasuk.cetak-laporan', compact('suratmasuk'));
    }

    public function cetakForm()
    {
        return view('SuratMasuk.cetak-laporan-form');
    }

    public function cetakLaporanFilter($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $suratmasuk = Suratmasuk::get()->whereBetween('tanggal_surat', [$tglawal, $tglakhir]);
        return view('SuratMasuk.cetak-laporan', compact('suratmasuk'));
    }

}
