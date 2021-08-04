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
                    <label for="tujuan">Tujuan</label>
                    <select name="tujuan" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                        required>
                        {{-- <option >-- Pilih Tujuan Disposisi --</option> --}}
                        @foreach($unit_kerja as $unit_kerja)
                        <option value="{{$unit_kerja->unit_kerja}}">{{$unit_kerja->unit_kerja}}
                        </option>
                        @endforeach
                    </select>
                    <label for="isi">Isi</label>
                    <input name="isi" type="text" class="form-control bg-light" placeholder="Isi" required>
                    <label for="batas_waktu">Tanggal</label>
                    <input name="tgl_disp" type="date" class="form-control bg-light" required>
                    <label for="catatan">Catatan</label>
                    <input name="catatan" type="text" class="form-control bg-light" placeholder="Catatan" required>
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
