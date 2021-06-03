@extends('layouts.master')

@section('title')


@section('content')
<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah Jenis Surat</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('jenissurat.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-md-12">
            <label for="">Nama</label>
            <input type="text" name="jenis_surat" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Nama">
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
