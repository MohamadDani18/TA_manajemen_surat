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
      <h3 class="card-title">BUAT SURAT EDARAN</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

        <form action="{{ route('surat.tambahedaran') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-row">
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Nomor Surat</label>
                        <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                             placeholder="Nomor Surat" required>
              </div>
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Lampiran</label>
                        <input value="{{old('lampiran')}}" name="lampiran" type="text" class="form-control bg-light"
                             placeholder="Lampiran" required>
                             <small  class="form-text text-muted">Tulis '-' jika tidak ada</small>
              </div>

              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Tempat Surat</label>
                        <input value="{{old('tempat_surat')}}" name="tempat_surat" type="text" class="form-control bg-light"
                             placeholder="Contoh: Tegal" required>
                             <small  class="form-text text-muted">Tempat diterbitkannya surat</small>
              </div> --}}

              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Perihal</label>
                        <input value="{{old('perihal')}}" name="perihal" type="text" class="form-control bg-light"
                             placeholder="contoh: menghadiri undangan" required>
                             <small  class="form-text text-muted">Pokok isi surat</small>
              </div>
              <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Tujuan Surat</label>
                        <input value="{{old('tujuan_surat')}}" name="tujuan_surat" type="text" class="form-control bg-light"
                             placeholder="Masukan Tujuan Surat" required>
                             <small  class="form-text text-muted">Jabatan Penerima Surat</small>
              </div>

              <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <label for="">Salam Pembuka</label>
                        <input value="Dengan Hormat," name="salam_pembuka" type="text" class="form-control bg-light"
                             placeholder="Tujuan Surat" required>
              </div>

              <div class="form-group col-md-12">
                <label>Paragraf pertama</label>
                <textarea name="isi" class="form-control bg"  rows="3"
                            placeholder=""
                            required>berkenaan dengan telah di distribusikannya blangko e-ktp hasil pengadaan anggaran 2020 sebanyak 10 juta keping ke seluruh indonesia dan saat in idibeberapa kabupaten/kota mengalami kekuarangan blangko e-ktp dengan ini disampaikan hal-hal sebagai berikut:</textarea>
              </div>

              <div class="form-group col-md-12"><hr>
                <label>isi pertama</label>
                <textarea name="isi1" class="form-control bg"  rows="3"
                            placeholder=""
                            > </textarea>
              </div>

              <div class="form-group col-md-12">
                <label>isi Kedua</label>
                <textarea name="isi2" class="form-control bg"  rows="3"
                            placeholder=""
                            > </textarea>
              </div>

              <div class="form-group col-md-12">
                <label>Isi Ketiga</label>
                <textarea name="isi3" class="form-control bg"  rows="3"
                            placeholder=""
                            ></textarea>
              </div>

              <div class="form-group col-md-12"><hr>
                <label>Salam Penutup</label>
                <textarea name="salam_penutup" class="form-control bg" rows="3"
                            placeholder=""
                            required>Demikian surat ini kami sampaikan, atas perhatian dan kehadiran Bapak/Ibu kami ucapkan terima kasih.</textarea>
              </div>

              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6"><hr>
                <label for="">Tembusan</label>
                        <input name="tembusan1" type="text" class="form-control bg-light" placeholder="Tembusan 1" >
                <label for=""></label>
                        <input placeholder="Tembusan 2" name="tembusan2" type="text" class="form-control bg-light">
                <label for=""></label>
                        <input placeholder="Tembusan 3" name="tembusan3" type="text" class="form-control bg-light">
              </div> --}}

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


