@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 20px 10px 10px 10px ">
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
        <div class="row">
            <div class="col">
                <h5><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Verifikasi Surat</h5>
                <hr />
            </div>
        </div>
        <div class="row table-responsive">
            <div class="col">
                <table class="table table-bordered table-hover table-head-fixed" id='tabelSuratmasuk'>
                    <thead>
                        <tr class="bg-light">
                            <th>No.</th>
                            <th>No. Surat</th>
                            <th>Perihal</th>
                            <th>Tujuan Surat</th>
                            <th>Tempat Surat</th>
                            <th>Tgl. Surat</th>
                             <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($surat as $surat)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->perihal}}</td>
                            <td>{{$surat->tujuan_surat}}</td>
                            <td>{{$surat->tempat_surat}}</td>
                            <td>{{$surat->tgl_surat}}</td>
                            <td>{{$surat->keterangan}}</td>
                            <td>
                                <form onsubmit="return confirm('apakah anda yakin?');" action="{{ route('surat.destroy',$surat->id) }}" method="POST">

                                    {{--  <a class="btn btn-warning btn-sm my-1 mr-sm-1 btn-block" href="{{ route('disposisi.index',$suratmasuk->id) }}">Disposisi</a>  --}}
                                    <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.show', $surat->id) }}">
                                        <i class="fas fa-file-archive"></i> Show</a>

                                    <a class="btn btn-success btn-sm my-1 mr-sm-1 " data-toggle="modal"
                                    data-target="#tambahklasifikasi"><i class="nav-icon fas fa-edit"></i>Confirm</a>

                                    @csrf
                                    @method('DELETE')

                                    {{-- <button type="submit" class="btn btn-danger btn-sm my-1 mr-sm-1 "><i class="nav-icon fas fa-trash"></i> Hapus</button> --}}

                                </form>
                            </td>
                            <!--modal konfirmasi-->
        <div class="modal fade" id="tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Konfirmasi Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <select name="keterangan" class="custom-select my-1 mr-sm-2 bg-light" id="keterangan" required>
                                    <option>Terverifikasi</option>
                                    <option>ditolak</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                            SUBMIT</button>
                        {{--  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="fas fa"></i>
                            TIDAK</button>  --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</section>
@endsection
