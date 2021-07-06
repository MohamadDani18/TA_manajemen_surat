@extends('layouts.master')

@section('title')


@section('content')



    <div class="card">
        <div class="card-body">
            @foreach ($suratkeluar as $w)
            <form action="{{ route('suratkeluar.update', [$w->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{ method_field('PUT') }}
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Tujuan Surat :</label>
                        <input type="text" name="tujuan_surat" class="form-control @error('tujuan_surat') is-invalid @enderror"  value="{{$w->tujuan_surat}}" autocomplete="off">
                        @error('tujuan_surat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Nomer Surat :</label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"  value="{{$w->no_surat}}" autocomplete="off">
                        @error('no_surat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">

                            <label for="kode">Kode Klasifikasi</label>
                            <select name="kode" class="custom-select my-1 mr-sm-2 bg-light" id="kode"
                                value="{{$w->kode}}" required>
                                <option selected>{{$w->kode}}</option>
                                @foreach($data_klasifikasi as $klasifikasi)
                                <option value="{{$klasifikasi->kode}}">{{$klasifikasi->nama}} ( {{$klasifikasi->kode}} )
                                </option>
                                @endforeach
                            </select>
                        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Tanggal Surat :</label>
                            <input type="date" name="tgl_surat" class="form-control" value="{{$w->tgl_surat}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Isi ringkas :</label>
                            <textarea name="isi" rows="3" class="form-control @error('isi') is-invalid @enderror">{{$w->isi}}</textarea>
                            @error('isi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                        <hr>
                        @if($w->gambar)
                            <img width="25%" src="{{asset('/storage/'.$w->gambar)}}">
                        @else
                            <img src="" alt="" width="25%">
                        @endif
                        <hr>
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">File</label>
                            <input name="filekeluar" type="file" class="form-control-file" id="exampleFormControlFile1"
                                value="{{$w->filekeluar}}">
                            <small id="exampleFormControlFile1" class="text-warning">
                                Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>

@endsection
