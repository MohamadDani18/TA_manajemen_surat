<?php

namespace App\Http\Controllers;

use App\Suratkeluar;
use App\Suratmasuk;
use App\Klasifikasi;
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
        if($request->ajax()){
            $data = Suratkeluar::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $c = csrf_field();
                    return '
                        <form action="'.route('suratkeluar.destroy', $data->id).'" method="post"
                        id="data'. $data->id.'">
                        '.$c.'
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <a href="'.route('suratkeluar.show', $data->id).'" class="btn btn-primary btn-sm"><i class="fas fa-file-archive" title="Detail"></i><span>&nbsp; Show</span></a>
                            <a href="'.route('suratkeluar.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp; Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                        ';
                })
            ->RawColumns(['action'])
            ->make(true);
        }
        return view('SuratKeluar.index');
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
    public function store(Request $request)
    {
        $request->validate([
            'filekeluar'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'unique:suratmasuk|min:5',
            'isi'        => 'min:5',
            'keterangan' => 'min:5',

        ]);

        $suratkeluar = new Suratkeluar();
        $suratkeluar->tujuan_surat    = $request->input('tujuan_surat');
        $suratkeluar->no_surat       = $request->input('no_surat');
        $suratkeluar->kode    = $request->input('kode');
        $suratkeluar->tgl_surat  = $request->input('tgl_surat');
        $suratkeluar->isi    = $request->input('isi');
        $file                      = $request->file('filekeluar');
        $fileName   = 'suratKeluar-'. $file->getClientOriginalName();
        $file->move('datasuratkeluar/', $fileName);
        $suratkeluar->filekeluar  = $fileName;
        $suratkeluar->users_id = Auth::id();
        $suratkeluar->save();
        return redirect('suratkeluar')->with("sukses", "Data Surat keluar Berhasil Ditambahkan");

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratkeluar = Suratkeluar::where('id',$id)->get();
        return view('SuratKeluar.detail', ['suratkeluar' => $suratkeluar]);
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
        $request->validate([
            'gambar'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            // 'no_surat'   => 'unique:suratmasuk|min:3',
            'isi_ringkas'        => 'min:5',

        ]);

        $suratkeluar = Suratkeluar::findOrFail($id);
        $suratkeluar->update($request->all());
        //Untuk Update File
        if($request->hasFile('filekeluar')){
            $request->file('filekeluar')->move('datasuratkeluar/', 'suratKeluar-'. $request->file('filekeluar')->getClientOriginalName());
            $suratkeluar->filekeluar = 'suratKeluar-'. $request->file('filekeluar')->getClientOriginalName();
            $suratkeluar->save();
        }

         $suratkeluar->save();
        return redirect('suratkeluar')->with("sukses", "Data Surat Masuk Berhasil diubah");

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suratkeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suratkeluar::destroy($id);
        return redirect('suratkeluar')->with('success', 'Data berhasil di delete !');
    }
}
