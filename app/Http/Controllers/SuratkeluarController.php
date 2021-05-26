<?php

namespace App\Http\Controllers;

use App\Suratkeluar;
use App\Suratmasuk;
use App\Jenissurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                        <a href="'.route('suratkeluar.show', $data->id).'" class="btn btn-primary btn-sm"><i class="fas fa-file-archive"></i><span>&nbsp;Show</span></a>
                            <a href="'.route('suratkeluar.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
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
        $jenissurat = Jenissurat::all();
        return view('SuratKeluar.create', ['jenis_surat' => $jenissurat]);
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
            'gambar'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            // 'no_surat'   => 'unique:suratmasuk|min:3',
            'isi_ringkas'        => 'min:5',

        ]);

        $suratkeluar = new Suratkeluar();
        $suratkeluar->tujuan_surat    = $request->input('tujuan_surat');
        $suratkeluar->no_surat       = $request->input('no_surat');
        $suratkeluar->jenis_surat    = $request->input('jenis_surat');
        $suratkeluar->tanggal_surat  = $request->input('tanggal_surat');
        $suratkeluar->isi_ringkas    = $request->input('isi_ringkas');
        //mengambil request gambar dengan nama asli
        $image = $request->file('gambar')->getClientOriginalName();
        //save gambar ke folder storage wisata
        $suratkeluar->gambar = $request->file('gambar')->storeAs('images', $image);

        $suratkeluar->save();
        return redirect('suratkeluar')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

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
        //mengambil relasi Jenis surat
        $jenissurat = jenissurat::all();
        $suratkeluar = Suratkeluar::where('id',$id)->get();
        return view('suratkeluar.edit', ['suratkeluar' => $suratkeluar], ['jenis_surat' => $jenissurat] );
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
        $suratkeluar->no_surat       = $request->no_surat;
        $suratkeluar->tujuan_surat     = $request->tujuan_surat;
        $suratkeluar->jenis_surat    = $request->jenis_surat;
        $suratkeluar->tanggal_surat  = $request->tanggal_surat;
        $suratkeluar->isi_ringkas    = $request->isi_ringkas;
        if ($request->gambar) {
            Storage::delete($suratkeluar->gambar);
            //mengambil request gambar dengan nama asli
            $image = $request->file('gambar')->getClientOriginalName();
            $suratkeluar->gambar = $request->file('gambar')->storeAs('images', $image);
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
