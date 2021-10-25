@extends('layouts.master')

@section('title')


@section('content')
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
<!-- Default box -->
<div class="card">

    <div class="card-header">
      <h3 class="card-title">Tembusan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-row">

              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                {{-- <label for="">Tembusan</label><br> --}}
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Sekretaris">Sekretaris</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Sub Bagian Perencanaan">Sub Bagian Perencanaan</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Sub Bagian Keuangan">Sub Bagian Keuangan</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Sub Bagian Umum dan Kepegawaian">Sub Bagian Umum dan Kepegawaian</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Seksi Identitas Penduduk">Seksi Identitas Penduduk</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Seksi Pindah Datang dan Pendataan Penduduk">Seksi Pindah Datang dan Pendataan Penduduk</label><br>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Seksi Kelahiran dan Kematian">Seksi Kelahiran dan Kematian</label>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Seksi Sistem Informasi Administrasi Kependudukan">Seksi Sistem Informasi Administrasi Kependudukan</label>
                <label class="form-check-label"><input type="checkbox" name="tembusan[]" value="Seksi Pengolahan dan Penyajian Data Kependudukan">Seksi Pengolahan dan Penyajian Data Kependudukan</label><br><hr>
                        <small  class="form-text text-muted">kosongkan jika tidak ada</small>
              </div>

          </form>

    </div>

    <div class="card-footer">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <!-- /.card-footer-->
  </div>
</div>


  <!-- /.card -->
@endsection


