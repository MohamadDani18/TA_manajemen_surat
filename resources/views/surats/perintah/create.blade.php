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
      <h3 class="card-title">BUAT SURAT PERINTAH</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

        <form action="{{ route('surat.tambahperintah') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-row">
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Nomor Surat</label>
                        <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                             placeholder="Nomor Surat" required>
              </div>

              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Tempat Surat</label>
                        <input value="{{old('tempat_surat')}}" name="tempat_surat" type="text" class="form-control bg-light"
                             placeholder="Contoh: Tegal" required>
                             <small  class="form-text text-muted">Tempat diterbitkannya surat</small>
              </div> --}}

              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Salam Pembuka</label>
                        <input value="Dengan Hormat," name="salam_pembuka" type="text" class="form-control bg-light"
                             placeholder="Tujuan Surat" required>
              </div>

              <div class="form-group col-md-12">
                <label>Isi Surat</label>
                <textarea name="isi" class="form-control bg"  rows="3"
                            placeholder=""
                            required>Kepala dinas kependudukan dan pencatatan sipil kota tegal dengan ini menugaskan kepada saudara:</textarea>
              </div>
              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Nama</label>
                        <input value="{{old('nama')}}" name="nama" type="text" class="form-control bg-light"
                             placeholder="Tuliskan Nama" required>
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Nip</label>
                        <input value="{{old('nip')}}" name="nip" type="number" class="form-control bg-light"
                             placeholder="Tuliskan Nip" required>
                             {{-- <small  class="form-text text-muted">Tempat diterbitkannya surat</small> --}}
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Unit Kerja</label>
                        <input value="{{old('unitkerja')}}" name="unitkerja" type="text" class="form-control bg-light"
                             placeholder="Tuliskan Unit Kerja" required>
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Tugas</label>
                        <input value="{{old('tugas')}}" name="tugas" type="text" class="form-control bg-light"
                             placeholder="Tuliskan Tugas" required>
                             {{-- <small  class="form-text text-muted">Tempat diterbitkannya surat</small> --}}
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <label for="">Hari & Tanggal</label>
                        <input name="hari_tgl" type="text" class="form-control bg-light"
                             placeholder="Contoh: Senin, 10 maret 2021" required>
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <label for="">Waktu</label>
                        <input placeholder="Tulis Waktu" name="waktu" type="text" class="form-control bg-light"
                              required>
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <label for="">Tempat</label>
                        <input placeholder="Tulis Tempat" name="tempat" type="text" class="form-control bg-light"
                              required>
              </div>

              <div class="form-group col-md-12">
                <label>Salam Penutup</label>
                <textarea name="salam_penutup" class="form-control bg" rows="3"
                            placeholder=""
                            required>setelah melaksanakan tugas ini harap segera membuat laporan dan atas perhatiannya disampaikan terima kasih.</textarea>
              </div>

          </form>

    </div>

    <div class="card-footer">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Buat Surat</button>
        </div>
    </div>
    <!-- /.card-footer-->
  </div>
</div>


  <!-- /.card -->
@endsection


