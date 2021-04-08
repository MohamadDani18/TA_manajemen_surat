@extends('layout.master')

@section('title', 'Tambah')


@section('content')
<!-- Default box -->
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Surat Masuk</h3>

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
      @csrf
      <form role="form">
        <div class="box-body">
            <div class="form-row">
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">Asal Surat</label>
            <input type="text" name="asal_surat" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Asal Surat">
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <label for="">No Surat</label>
            <input type="text" name="no_surat" class="form-control form-control-border border-width-2" id="" placeholder="No Surat">
          </div>

          <div class="form-group col-md-6">
            <label for="">Penerima Surat</label>
            <input type="text" name="penerima_surat" class="form-control form-control-border border-width-2" id="" placeholder="Masukan Penerima Surat">
          </div>

          <div class="form-group col-md-6">
            <label>Jenis Surat</label>
            <select class="form-control select2bs4" name="jenis_surat" style="width: 100%;">
              <option selected="selected">Pilih jenis</option>
              <option>Resmi</option>
              <option>Tidak Resmi</option>
            </select>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group col-md-6">
            <label>Date </label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" name="tanggal_surat" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
            <!-- /.input group -->
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>

          <!-- textarea -->
          <div class="form-group col-md-6">
            <label>Isi Ringkas</label>
            <textarea class="form-control" name="isi_ringkas" rows="3" placeholder="Enter ..."></textarea>
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

  <script>
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
</script>

@endsection
