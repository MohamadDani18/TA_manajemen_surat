@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('unitkerja.update',$unit_kerja->id) }}" method="POST" enctype="multipart/form-data">
            <h3><i class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Edit Unit Kerja</h3>
            <hr>
            {{csrf_field()}}
            <div class="row">
                @method('PUT')
                <div class="col-6">
                    <label for="unit_kerja">Nama</label>
                    <input name="unit_kerja" type="text" class="form-control bg-light" id="unit_kerja"
                        placeholder="Unit Kerja" value="{{$unit_kerja->unit_kerja}}" required>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
            <a class="btn btn-danger btn-sm" href="{{route('unitkerja.index')}}" role="button"><i class="fas fa-undo"></i>
                BATAL</a>
        </form>
    </div>
</section>
@endsection
