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
                <h5><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Permintaan Surat</h5>
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
                            {{-- <th>Tempat Surat</th> --}}
                            <th>Tgl. Surat</th>
                             <th>Status</th>
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
                            {{-- <td>{{$surat->tempat_surat}}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($surat->tgl_surat)->format('d-m-Y')}}</td>
                            <td><span class="">{{$surat->keterangan}}</span></td>
                            <td>
                                        @if ($surat->jenis_surat == 'surat edaran')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('surat.editedaran', $surat->id) }}">
                                            <i class="fas fa-print"></i> Edit</a>
                                        @elseif($surat->jenis_surat == 'surat undangan')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('surat.edit', $surat->id) }}">
                                            <i class="fas fa-print"></i> Edit</a>
                                        @elseif($surat->jenis_surat == 'surat permohonan')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('surat.editpermohonan', $surat->id) }}">
                                            <i class="fas fa-print"></i> Edit</a>
                                        @elseif($surat->jenis_surat == 'surat perintah')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('surat.editperintah', $surat->id) }}">
                                            <i class="fas fa-print"></i> Edit</a>
                                        @else

                                        @endif
                                        <a href="{{ route('surat.tembusan', $surat->id) }}"
                                            class="btn btn-warning btn-sm my-1 mr-sm-1"><i
                                                class="fas fa-paperclip"></i> Tembusan</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
