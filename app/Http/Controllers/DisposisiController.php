<?php

namespace App\Http\Controllers;

use App\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SweetAlert;
use DataTables;
use Storage;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Disposisi::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $c = csrf_field();
                    return '
                        <form action="'.route('disposisi.destroy', $data->id).'" method="post"
                        id="data'. $data->id.'">
                        '.$c.'
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <a href="'.route('disposisi.show', $data->id).'" class="btn btn-primary btn-sm"><i class="fas fa-file-archive"></i><span>&nbsp;Show</span></a>
                            <a href="'.route('disposisi.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                        ';
                })
            ->RawColumns(['action'])
            ->make(true);
        }
        return view('disposisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disposisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $disposisi = new Disposisi();
        $disposisi->id_surat    = $request->input('id_surat');
        $disposisi->tujuan_disposisi    = $request->input('tujuan_disposisi');
        $disposisi->isi_disposisi    = $request->input('isi_disposisi');
        $disposisi->sifat  = $request->input('sifat');
        $disposisi->batas_waktu  = $request->input('batas_waktu');

        $disposisi->save();
        return redirect('disposisi')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

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
    public function edit(Disposisi $disposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disposisi $disposisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disposisi  $disposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disposisi $disposisi)
    {
        //
    }
}
