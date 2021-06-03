@extends('layouts.master')

@section('title')


@section('content')


<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Detail Surat Keluar</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                @foreach ($suratkeluar as $w)
                    <tr>
                        <th width="25%">Tujuan Surat</th>
                        <td>{{$w->tujuan_surat}}</td>
                    </tr>
                    <tr>
                        <th>Nomer Surat</th>
                        <td>{{$w->no_surat}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Surat</th>
                        <td>{{$w->jenis_surat}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat</th>
                        <td>{{$w->tanggal_surat}}</td>
                    </tr>
                    <tr>
                        <th>Isi Ringkas</th>
                        <td>{{$w->isi_ringkas}}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>
                            @if($w->gambar)
                            <img width="25%" src="{{asset('/storage/'.$w->gambar)}}">
                            @else
                            <img src="https://duniatravel.co.id/wp-content/uploads/logo-wonderful-indonesia.jpg" alt="" width="25%">
                            @endif
                        </td>
                    </tr>

                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
