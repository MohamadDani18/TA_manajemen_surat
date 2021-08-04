@extends('layouts.master')

@section('title')


@section('content')


<div class="card mb-4">
    <div class="card-header"><i class="far fa-list-alt mr-1"></i></i>Detail Surat Masuk</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                @foreach ($suratmasuk as $suratmasuk)
                    <tr>
                        <th width="25%">Asal Surat</th>
                        <td>{{$suratmasuk->asal_surat}}</td>
                    </tr>
                    <tr>
                        <th>Nomer Surat</th>
                        <td>{{$suratmasuk->no_surat}}</td>
                    </tr>
                    {{-- <tr>
                        <th>Isi Ringkas</th>
                        <td>{{$w->isi}}</td>
                    </tr> --}}
                    <tr>
                        <th>Kode Klasifikasi</th>
                        <td>{{$suratmasuk->kode}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat</th>
                        <td>{{$suratmasuk->tgl_surat}}</td>
                    </tr>
                    <tr>
                        <th>Isi Ringkas</th>
                        <td>{{$suratmasuk->isi}}</td>
                    </tr>
                    <tr>
                        <th>File</th>
                        <td>
                            <div class="row">
                                <div class="col-8">
                                    <h5>{{$suratmasuk->filemasuk}}</h5>
                                </div>
                                <div class=col-4>
                                    <a style="float: right" class="btn btn-primary btn-sm my-4 mr-sm-2"
                                        href="/datasuratmasuk/{{$suratmasuk->filemasuk}}" download="{{$suratmasuk->filemasuk}}"
                                        role="button"><i class="fas fa-file-download"></i> Download</a>
                                    {{-- <a style="float: right" class="btn btn-danger btn-sm my-4 mr-sm-2" href="/suratmasuk/index"
                                        role="button"><i class="fas fa-undo"></i> Kembali</a> --}}
                                </div>
                            </div>
                            
                        </td>
                    </tr>

                    @endforeach
            </table>

        </div>
    </div>
</div>


@endsection
