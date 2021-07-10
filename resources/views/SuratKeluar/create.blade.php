@extends('layouts.master')

@section('title')


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
            <label for="">Nomer Surat</label>
                    <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                         placeholder="Nomer Surat" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Tujuan Surat</label>
                    <input value="{{old('tujuan_surat')}}" name="tujuan_surat" type="text" class="form-control bg-light"
                         placeholder="Tujuan Surat" required>
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
            <label for="">Tanggal Surat</label>
                    <input value="{{old('tgl_surat')}}" name="tgl_surat" type="date" class="form-control bg-light" required>
          </div>

          <!-- textarea -->
          <div class="form-group col-md-6">
            <label>Isi Ringkas</label>
            <textarea name="isi" class="form-control bg-light"  rows="3"
                        placeholder="Isi Ringkas Surat Masuk" required>{{old('isi')}}</textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleFormControlFile1">File</label>
                        <input name="filekeluar" type="file" class="form-control-file" id="validatedCustomFile"
                            required>
                        <small id="validatedCustomFile" class="text-danger">
                            Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!
                        </small>
          </div>

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
