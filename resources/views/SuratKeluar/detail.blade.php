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
                        <th>Kode Klasifikasi</th>
                        <td>{{$w->kode}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat</th>
                        <td>{{$w->tgl_surat}}</td>
                    </tr>
                    <tr>
                        <th>Isi Ringkas</th>
                        <td>{{$w->isi}}</td>
                    </tr>
                    <tr>
                        <th>File</th>
                        <td>
                            @if($w->filemasuk!= NULL)
                                   <img src="{{URL::to('/')}}/images/{{$suratkeluar->filemasuk}}" class="mask waves-effect waves-light rgba-white-slight" height="85px" width="85px" width="auto">
                                @else
                                    <h5 style="color:red">Tidak ada Gambar</h5>
                                @endif
                        </td>
                    </tr>

                    @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
