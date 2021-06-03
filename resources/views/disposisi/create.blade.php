@extends('layouts.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah disposisi</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">ID surat</label>
                    <input value="{{old('id_surat')}}" name="id_surat" type="text" class="form-control bg-light"
                         placeholder="ID surat" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Tujuan Disposisi</label>
                    <input value="{{old('tujuan_disposisi')}}" name="tujuan_disposisi" type="text" class="form-control bg-light"
                         placeholder="Tujuan Disposisi" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Sifat</label>
                    <input value="{{old('sifat')}}" name="sifat" type="text" class="form-control bg-light"
                         placeholder="Isi Sifat" required>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group col-md-6">
            <label for="">Batas Waktu</label>
                    <input value="{{old('batas_waktu')}}" name="batas_waktu" type="date" class="form-control bg-light" required>
          </div>

          <!-- textarea -->
          <div class="form-group col-md-6">
            <label>Isi Disposisi</label>
            <textarea name="isi_disposisi" class="form-control bg-light"  rows="3"
                        placeholder="Isi Disposisi" required>{{old('isi_disposisi')}}</textarea>
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
