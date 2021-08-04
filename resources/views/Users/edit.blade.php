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
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Edit user</div>
    <div class="card-body">
      <!-- form start -->
      @foreach ($user as $u)
      <form action="{{ route('user.update', [$u->id]) }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-row">
            {{ method_field('PUT') }}
          <div class="form-group col-md-12">
            <label for="">Nama</label>
            <input type="text" name="name" value="{{$u->name}}" autocomplete="off" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Nama">
          </div>
          <div class="form-group col-md-12">
            <label for="unit_kerja">Unit Kerja</label>
                    <select name="unit_kerja" class="form-control form-control-border border-width-2" id="unit_kerja"
                        value="{{$u->unit_kerja}}" required>
                        <option selected>{{$u->unit_kerja}}</option>
                        @foreach($unit_kerja as $unit_kerja)
                        <option value="{{$unit_kerja->unit_kerja}}">{{$unit_kerja->unit_kerja}}
                        </option>
                        @endforeach
                    </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Email</label>
            <input type="email" name="email" value="{{$u->email}}" autocomplete="off" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Email">
          </div>
          <div class="form-group col-md-12">
            <label for="role">Level</label>
            <select name="role" id="role" autocomplete="off" class="form-control form-control-border border-width-2" required>
                <option value="admin" @if ($u->role == 'admin') selected @endif>Admin </option>
                <option value="pegawai" @if ($u->role == 'pegawai') selected @endif>Pegawai</option>
                <option value="kepala" @if ($u->role == 'kepala') selected @endif>Kepala</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="">Password</label>
            <input type="password" name="password" value="{{$u->password}}" autocomplete="off" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Password">
          </div>

        <!-- /.box-body -->
      </form>
    </div>
    @endforeach
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

@endsection
