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
                <h5><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Surat Keluar</h5>
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
                             <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($suratkeluar as $surat)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$surat->no_surat}}</td>
                            <td>{{$surat->perihal}}</td>
                            <td>{{$surat->tujuan_surat}}</td>
                            {{-- <td>{{$surat->tempat_surat}}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($surat->tgl_surat)->format('d-m-Y')}}</td>
                            <td><span class="badge badge-success">{{$surat->keterangan}}</span></td>
                            <td>
                                <form onsubmit="return confirm('apakah anda yakin?');" action="{{ route('surat.destroy',$surat->id) }}" method="POST">

                                    {{--  <a class="btn btn-warning btn-sm my-1 mr-sm-1 btn-block" href="{{ route('disposisi.index',$suratmasuk->id) }}">Disposisi</a>  --}}
                                    <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.show', $surat->id) }}">
                                        <i class="fas fa-print"></i> Cetak</a>
                                    @if (auth()->user()->role == 'admin')
                                    @csrf
                                    @method('DELETE')

                                    {{-- <button type="submit" onclick="'deleteData'" class="btn btn-danger btn-sm my-1 mr-sm-1 "><i class="nav-icon fas fa-trash"></i> Hapus</button> --}}
                                     @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    function deleteData(id) {
        swal({
            title: "Anda Yakin ?",
            text: "Data terhapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
            if (willDelete) {
                $('#data' + id).submit();
            }
        })
    }
</script>
@endsection
