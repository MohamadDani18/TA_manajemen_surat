@extends('layouts.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah Surat Keluar</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('suratkeluar.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Tujuan Surat</label>
                    <input value="{{old('tujuan_surat')}}" name="tujuan_surat" type="text" class="form-control bg-light"
                         placeholder="Tujuan Surat" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Nomor Surat</label>
                    <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                         placeholder="Nomor Surat" required>
          </div>


          <div class="form-group col-md-6">
            <label for="">Jenis_surat</label>
                    <select name="jenis_surat" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                        required>
                        <option value="">Pilih Jenis Surat</option>
                                @foreach ($jenis_surat as $w)
                                    <option value="{{$w->jenis_surat}}">{{$w->jenis_surat}}</option>
                                @endforeach
                    </select>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group col-md-6">
            <label for="">Tanggal Surat</label>
                    <input value="{{old('tanggal_surat')}}" name="tanggal_surat" type="date" class="form-control bg-light" required>
          </div>

          <!-- textarea -->
          <div class="form-group col-md-6">
            <label>Isi Ringkas</label>
            <textarea name="isi_ringkas" class="form-control bg-light"  rows="3"
                        placeholder="Isi Ringkas Surat Masuk" required>{{old('isi_ringkas')}}</textarea>
          </div>

          <div class="form-group col-md-6">
            <label>Gambar :</label>
            <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
            @error('gambar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>


        <!-- /.box-body -->
      </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->



@endsection
