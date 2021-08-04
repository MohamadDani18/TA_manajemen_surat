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
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah User</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-md-12">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Nama">
          </div>
          <div class="form-group col-md-12">
            <label for="unit_kerja">Unit Kerja</label>
                    <select name="unit_kerja" class="form-control form-control-border border-width-2" id="inlineFormCustomSelectPref"
                        required>
                        {{-- <option >-- Pilih Tujuan Disposisi --</option> --}}
                        @foreach($unit_kerja as $unit_kerja)
                        <option value="{{$unit_kerja->unit_kerja}}">{{$unit_kerja->unit_kerja}}
                        </option>
                        @endforeach
                    </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Email">
          </div>
          <div class="form-group col-md-12">
            <label for="role">Level</label>
                    <select name="role" id="role" class="form-control form-control-border border-width-2" required>
                        <option value="admin">Administrator</option>
                        <option value="pegawai">Pegawai</option>
                        {{-- <option value="kepala">Kepala</option> --}}
                    </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Password">
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
