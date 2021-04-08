<?php

namespace App\Http\Controllers;

use App\Jenissurat;
use Illuminate\Http\Request;
use SweetAlert;
use Illuminate\Support\Facades\DB;
use DataTables;

class JenissuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = jenissurat::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $c = csrf_field();
                    return '
                        <form action="'.route('jenissurat.destroy', $data->id).'" method="post"
                        id="data'. $data->id.'">
                        '.$c.'
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                            <a href="'.route('jenissurat.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                        ';
                })
            ->RawColumns(['action'])
            ->make(true);
        }
        return view('JenisSurat.jenis');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JenisSurat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenissurat = new Jenissurat;
        $jenissurat->jenis_surat= $request->jenis_surat;

        $jenissurat->save();

        return redirect('jenissurat')->with('success','Data berhasil di simpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jenissurat  $jenissurat
     * @return \Illuminate\Http\Response
     */
    public function show(Jenissurat $jenissurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jenissurat  $jenissurat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenissurat = Jenissurat::where('id',$id)->get();
        return view('JenisSurat.edit', ['jenis_surat' => $jenissurat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jenissurat  $jenissurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenissurat = Jenissurat::findOrFail($id);

        $jenissurat->jenis_surat= $request->jenis_surat;

        $jenissurat->save();

        return redirect('jenissurat')->with('success', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jenissurat  $jenissurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenissurat::destroy($id);
        return redirect('jenissurat')->with('success', 'Data berhasil di delete !');
    }
}
