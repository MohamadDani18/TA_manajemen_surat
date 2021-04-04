<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\User;
use SweetAlert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = User::latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $c = csrf_field();
                    return '
                        <form action="'.route('user.destroy', $data->id).'" method="post"
                        id="data'. $data->id.'">
                        '.$c.'
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                            <a href="'.route('user.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                            <button onclick="deleteData('. $data->id .')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                        ';
                })
            ->RawColumns(['action'])
            ->make(true);
        }
        return view('users.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);

        $user->save();

        return redirect('user')->with('success','Data berhasil di simpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->get();
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);

        $user->save();

        return redirect('user')->with('success', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('success', 'Data berhasil di delete !');
    }
}
