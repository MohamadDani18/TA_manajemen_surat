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
        <div>
            @if (auth()->user()->role == 'kepala')
            <div class="col">
                <a data-toggle="modal" data-target="#tambahklasifikasi" class="btn btn-warning btn-sm my-1 mr-sm-1" role="button"><i class="fas fa-print"></i>
                    Cetak Data</a>
            </div>
            @endif
            <br>
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
                                @if ($surat->jenis_surat == 'surat edaran')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.tampiledaran', $surat->id) }}">
                                            <i class="fas fa-print"></i> Cetak</a>
                                        @elseif($surat->jenis_surat == 'surat undangan')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.show', $surat->id) }}">
                                            <i class="fas fa-print"></i> Cetak</a>
                                        @elseif($surat->jenis_surat == 'surat permohonan')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.tampilpermohonan', $surat->id) }}">
                                            <i class="fas fa-print"></i> Cetak</a>
                                        @elseif($surat->jenis_surat == 'surat perintah')
                                        <a class="btn btn-primary btn-sm my-1 mr-sm-1" target="_blank" href="{{ route('surat.tampilperintah', $surat->id) }}">
                                            <i class="fas fa-print"></i> Cetak</a>
                                        @else

                                        @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Cetak Data Surat </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action=" /filter-cetak-keluar " method="get" autocomplete="off" >
                        {{csrf_field()}}
                        <!-- filter kecamatan -->
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="jenis_surat">Jenis Surat</label>
                                <select name="jenis_surat" class="custom-select my-1 mr-sm-2 bg-light" id="inlineFormCustomSelectPref"
                                    required>
                                    <option selected disabled >-- Pilih Jenis Surat --</option>
                                    @foreach($data_klasifikasi as $klasifikasi)
                                    <option value="{{$klasifikasi->nama}}">{{$klasifikasi->nama}} ( {{$klasifikasi->id}} )
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- filter tanggal -->
                        <br><br><div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="label">Tanggal Awal :</label>
                                        <input type="date" name="tglawal" id="tglawal" class="form-control bg-light " required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="label">Tanggal Akhir :</label>
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control bg-light" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end filter tanggal -->

                        <hr>
                        <button type="submit" class="button btn btn-success btn-sm" target="_blank"><i class="fas fa-save"></i>CETAK</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close"><i class="fas fa"></i>
                            BATAL</button>
                    </form>
                </div>
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
