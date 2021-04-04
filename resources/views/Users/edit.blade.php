@extends('layouts.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data User</h3>

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
            <label for="">Email</label>
            <input type="email" name="email" value="{{$u->email}}" autocomplete="off" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Email">
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
