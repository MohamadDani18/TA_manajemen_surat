@extends('layouts.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Jenis Surat</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
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
