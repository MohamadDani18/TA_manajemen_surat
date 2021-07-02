@extends('layouts.master')

@section('title')


@section('content')



<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Cetak data Surat</div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="form-group col-md-6">
                <label for="label">Tanggal Awal :</label>
                <input type="date" name="tglawal" id="tglawal" class="form-control bg-light " required>
            </div>
            <div class="form-group col-md-6">
                <label for="label">Tanggal Akhir :</label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control bg-light" required>
            </div>
            <div class="form-group col-md-6">
                <a href="" onclick="this.href='/cetak-laporan-filter/'+ document.getElementById('tglawal').value
                + '/' + document.getElementById('tglakhir').value" target="blank" class="btn btn-primary">Filter Cetak Laporan <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection
