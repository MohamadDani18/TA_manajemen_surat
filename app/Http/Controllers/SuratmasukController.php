<?php

namespace App\Http\Controllers;

use App\Suratmasuk;
use App\Jenissurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SweetAlert;
use DataTables;
use Storage;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Suratmasuk::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $c = csrf_field();
                    return '
                        <form action="'.route('suratmasuk.destroy', $data->id).'" method="post"
                        id="data'. $data->id.'">
                        '.$c.'
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <a href="'.route('suratmasuk.show', $data->id).'" class="btn btn-primary btn-sm"><i class="fas fa-file-archive"></i><span>&nbsp;Show</span></a>
                            <a href="'.route('suratmasuk.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                        ';
                })
            ->RawColumns(['action'])
            ->make(true);
        }
        return view('SuratMasuk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenissurat = Jenissurat::all();
        return view('SuratMasuk.create', ['jenis_surat' => $jenissurat]);
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

        $suratmasuk = new Suratmasuk();
        $suratmasuk->no_surat       = $request->input('no_surat');
        $suratmasuk->asal_surat     = $request->input('asal_surat');
        $suratmasuk->penerima_surat = $request->input('penerima_surat');
        $suratmasuk->jenis_surat    = $request->input('jenis_surat');
        $suratmasuk->tanggal_surat  = $request->input('tanggal_surat');
        $suratmasuk->isi_ringkas    = $request->input('isi_ringkas');
        //mengambil request gambar dengan nama asli
        $image = $request->file('gambar')->getClientOriginalName();
        //save gambar ke folder storage wisata
        $suratmasuk->gambar = $request->file('gambar')->storeAs('images', $image);

        $suratmasuk->save();
        return redirect('suratmasuk')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratmasuk = Suratmasuk::where('id',$id)->get();
        return view('SuratMasuk.detail', ['suratmasuk' => $suratmasuk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengambil relasi Jenis surat
        $jenissurat = jenissurat::all();
        $suratmasuk = Suratmasuk::where('id',$id)->get();
        return view('suratmasuk.edit', ['suratmasuk' => $suratmasuk], ['jenis_surat' => $jenissurat] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            // 'no_surat'   => 'unique:suratmasuk|min:3',
            'isi_ringkas'        => 'min:5',

        ]);

        $suratmasuk = Suratmasuk::findOrFail($id);
        $suratmasuk->no_surat       = $request->no_surat;
        $suratmasuk->asal_surat     = $request->asal_surat;
        $suratmasuk->penerima_surat = $request->penerima_surat;
        $suratmasuk->jenis_surat    = $request->jenis_surat;
        $suratmasuk->tanggal_surat  = $request->tanggal_surat;
        $suratmasuk->isi_ringkas    = $request->isi_ringkas;
        if ($request->gambar) {
            Storage::delete($suratmasuk->gambar);
            //mengambil request gambar dengan nama asli
            $image = $request->file('gambar')->getClientOriginalName();
            $suratmasuk->gambar = $request->file('gambar')->storeAs('images', $image);
         }

        $suratmasuk->save();
        return redirect('suratmasuk')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suratmasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suratmasuk::destroy($id);
        return redirect('suratmasuk')->with('success', 'Data berhasil di delete !');
    }
}
