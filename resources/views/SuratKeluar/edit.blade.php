@extends('layouts.master')

@section('title', 'Edit Surat Keluar')


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
                        <div class="form-group">
                            <label>Jenis Surat :</label>
                            <select name="jenis_surat" class="form-control" id="">
                                    <option value="">Pilih Jenis Surat</option>
                                @foreach ($jenis_surat as $item)
                                    <option value="{{$item->jenis_surat}}"
                                    @if ($w->jenis_surat == $item->jenis_surat)
                                        selected
                                    @endif
                                        >{{$item->jenis_surat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Tanggal Surat :</label>
                            <input type="date" name="tanggal_surat" class="form-control" value="{{$w->tanggal_surat}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Isi ringkas :</label>
                            <textarea name="isi_ringkas" rows="3" class="form-control @error('isi_ringkas') is-invalid @enderror">{{$w->isi_ringkas}}</textarea>
                            @error('isi_ringkas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <hr>
                        @if($w->gambar)
                            <img width="25%" src="{{asset('/storage/'.$w->gambar)}}">
                        @else
                            <img src="" alt="" width="25%">
                        @endif
                        <hr>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Ubah Gambar :</label>
                            <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" autocomplete="off">
                            @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>

@endsection
