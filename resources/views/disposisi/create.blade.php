@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
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
        <form action="{{ route('disposisi.store', $smasuk) }}" method="POST">
            <h3><i class="nav-icon fas fa-envelope-open-text my-1 btn-sm-1"></i> Tambah Disposisi</h3>
            <hr />
            {{csrf_field()}}
            <div class="row">
                <div class="col-6">
                    <label><strong>Tujuan :</strong></label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Sekretaris">Sekretaris</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Sub Bagian Perencanaan">Sub Bagian Perencanaan</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Sub Bagian Keuangan">Sub Bagian Keuangan</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Sub Bagian Umum dan Kepegawaian">Sub Bagian Umum dan Kepegawaian</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Seksi Identitas Penduduk">Seksi Identitas Penduduk</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Seksi Pindah Datang dan Pendataan Penduduk">Seksi Pindah Datang dan Pendataan Penduduk</label><br>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Seksi Kelahiran dan Kematian">Seksi Kelahiran dan Kematian</label>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Seksi Sistem Informasi Administrasi Kependudukan">Seksi Sistem Informasi Administrasi Kependudukan</label>
                                <label class="form-check-label"><input type="checkbox" name="tujuan[]" value="Seksi Pengolahan dan Penyajian Data Kependudukan">Seksi Pengolahan dan Penyajian Data Kependudukan</label>

                                <br><hr>
                    <label for="isi">Isi</label>
                    <input name="isi" type="text" class="form-control bg-light" placeholder="Isi" required>
                    {{--  <label for="batas_waktu">Tanggal</label>
                    <input name="tgl_disp" type="date" class="form-control bg-light" required>  --}}
                    <label for="catatan">Catatan</label><br>
                    <select name="catatan" id="catatan" class="custom-select my-1 mr-sm-2 bg-light">
                        <option selected disabled>== Pilih instruksi ==</option>
                        <option>segera ditindak lanjuti</option>
                        <option>tidak bersifat penting</option>
                    </select>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
            <a class="btn btn-danger btn-sm" href="{{ route('disposisi.index', $smasuk) }}" role="button"><i
                    class="fas fa-undo"></i> BATAL</a>
        </form>
    </div>

</section>
@endsection
