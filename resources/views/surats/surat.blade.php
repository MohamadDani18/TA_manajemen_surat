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
      <h3 class="card-title">BUAT SURAT</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

        <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-row">
              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6">
                <label for="">Nomor Surat</label>
                        <input value="{{old('no_surat')}}" name="no_surat" type="text" class="form-control bg-light"
                             placeholder="Nomer Surat" >
              </div> --}}
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
                <label>Isi Surat</label>
                <textarea name="isi" class="form-control bg"  rows="3"
                            placeholder=""
                            required>Sehubungan dengan akan diselenggarakannya acara ............, kami bermaksud mengundang Bapak/Ibu untuk berhadir pada acara tersebut yang akan dilaksanakan pada :</textarea>
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
                            required>Demikian surat undangan ini kami sampaikan, atas perhatian dan kehadiran Bapak/Ibu kami ucapkan terima kasih.</textarea>
              </div>
              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <label for="">Tertanda</label>
                        <input placeholder="Tulis nama" name="tertanda" type="text" class="form-control bg-light"
                              required>
              </div> --}}
              {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6"><hr>
                <label for="">Tembusan</label><br>
                <label><input type="checkbox" name="tembusan1[]" value="Sekretaris">Sekretaris</label>
                <label><input type="checkbox" name="tembusan1[]" value="Sub Bagian Perencanaan"> Sub Bagian Perencanaan</label>
                <label><input type="checkbox" name="tembusan1[]" value="Sub Bagian Keuangan">Sub Bagian Keuangan</label>
                <label><input type="checkbox" name="tembusan1[]" value="Sub Bagian Umum dan Kepegawaian">Sub Bagian Umum dan Kepegawaian</label>
                <label><input type="checkbox" name="tembusan1[]" value="Seksi Identitas Penduduk">Seksi Identitas Penduduk</label><br><hr>
                        <small  class="form-text text-muted">kosongkan jika tidak ada</small>
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


