@extends('layouts.master')

@section('title')


@section('content')
<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah Surat Keluar</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('suratmasuk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="nomorsurat">Nomor Surat</label>
                    <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                        id="nomorsurat" placeholder="Nomor Surat" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="asalsurat">Asal Surat</label>
                    <input value="{{old('asal_surat')}}" name="asal_surat" type="text" class="form-control bg-light"
                        id="asalsurat" placeholder="Asal Surat" required>
          </div>

          <div class="form-group col-md-6">
            <label for="kode">Kode Klasifikasi</label>
                    <select name="kode" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                        required>
                        <option value="">-- Pilih Klasifikasi Surat --</option>
                        @foreach($data_klasifikasi as $klasifikasi)
                        <option value="{{$klasifikasi->kode}}">{{$klasifikasi->nama}} ( {{$klasifikasi->kode}} )
                        </option>
                        @endforeach
                    </select>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group col-md-6">
            <label for="tglsurat">Tanggal Surat</label>
                    <input value="{{old('tgl_surat')}}" name="tgl_surat" type="date" class="form-control bg-light"
                        id="tglsurat" required>
          </div>
          <div class="form-group col-md-6">
            <label for="tglditerima">Tanggal Diterima</label>
            <input value="{{old('tgl_terima')}}" name="tgl_terima" type="date" class="form-control bg-light"
                id="tglditerima" required>
          </div>
          <div class="form-group col-md-6">
            <label for="keterangan">Keterangan</label>
            <input value="{{old('keterangan')}}" name="keterangan" type="text" class="form-control bg-light"
                id="keterangan" placeholder="Keterangan" required>
          </div>

          <!-- textarea -->
          <div class="form-group col-md-6">
            <label for="isisurat">Isi Ringkas</label>
                    <textarea name="isi" class="form-control bg-light" id="isisurat" rows="3"
                        placeholder="Isi Ringkas Surat Masuk" required>{{old('isi')}}</textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">File</label>
                        <input name="filemasuk" type="file" class="form-control-file" id="exampleFormControlFile1"
                            required>
                        <small id="exampleFormControlFile1" class="text-danger">
                            Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!
                        </small>
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
