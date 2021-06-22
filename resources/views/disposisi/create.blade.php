@extends('layouts.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Tambah disposisi</div>
    <div class="card-body">
      <!-- form start -->
      <form action="{{ route('disposisi.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Nomer Agenda</label>
                    <input value="{{old('no_agenda')}}" name="no_agenda" type="text" class="form-control bg-light"
                         placeholder="Nomer Agenda" required>
          </div>
          <div class="form-group col-md-6">
            <label for="">Nomer Surat</label>
                    <select name="surat_id" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                        required>
                        <option value="">Pilih Nomer Surat</option>
                                @foreach ($suratmasuk as $s)
                                    <option value="{{$s->no_surat}}">{{$s->no_surat}}</option>
                                @endforeach
                    </select>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Kepada</label>
                    <input value="{{old('kepada')}}" name="kepada" type="text" class="form-control bg-light"
                         placeholder="Tujuan Disposisi" required>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Sifat</label>
                    <input value="{{old('sifat')}}" name="sifat" type="text" class="form-control bg-light"
                         placeholder="segera" required>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">catatan</label>
                    <input value="{{old('catatan')}}" name="catatan" type="text" class="form-control bg-light"
                         placeholder="tanggapan disposisi" required>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group col-md-6">
            <label for="">Batas Waktu</label>
                    <input value="{{old('batas_waktu')}}" name="batas_waktu" type="date" class="form-control bg-light" required>
          </div>

          <!-- textarea -->
          {{-- <div class="form-group col-md-6">
            <label>Isi Disposisi</label>
            <textarea name="isi_disposisi" class="form-control bg-light"  rows="3"
                        placeholder="Isi Disposisi" required>{{old('isi_disposisi')}}</textarea>
          </div> --}}


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
