@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
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
                <h3><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Disposisi</h3>
                <hr />
            </div>
        </div>
        <div>
            <div class="col">
                <a class="btn btn-danger btn-sm my-1 mr-sm-1" href="{{route('suratmasuk.index')}}" role="button"><i
                        class="fas fa-undo"></i> Kembali</a>
                        @if (auth()->user()->role == 'kepala')
                <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('disposisi.create', $smasuk) }}"
                    role="button"><i class="fas fa-plus"></i> Tambah Data</a>
                    @endif
                <br><br>
            </div>
        </div>
        <div class="row table-responsive">
            <div class="col">
                <table class="table table-hover table-head-fixed" id='tabelKlasifikasi'>
                    <thead>
                        <tr class="bg-light">
                            <th>No.</th>
                            <th>Tujuan</th>
                            <th>Isi Disposisi</th>
                            {{--  <th>Sifat</th>  --}}
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($disp as $disposisi)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$disposisi->tujuan}}</td>
                            <td>{{$disposisi->isi}}</td>
                            {{--  <td>{{$disposisi->sifat}}</td>  --}}
                            <td>{{$disposisi->tgl_disp}}</td>
                            <td>{{$disposisi->catatan}}</td>
                            <td>
                                <form action="{{ route('disposisi.destroy', [$smasuk, $disposisi->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    @if (auth()->user()->role == 'kepala')
                                    <a href="{{ route('disposisi.edit', [$smasuk, $disposisi->id]) }}"
                                        class="btn btn-primary btn-sm my-1 mr-sm-1" role="button"><i
                                            class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                        @endif
                                    <a class="btn btn-primary btn-sm my-1 mr-sm-1"
                                         href="{{ route('disposisi.cetak', [$smasuk, $disposisi->id]) }}"
                                        target="_blank" role="button"><i class="fas fa-print"></i> Cetak</a>
                                    @if (auth()->user()->role == 'kepala')
                                    {{-- <button type="submit" class="btn btn-danger btn-sm my-1 mr-sm-1"
                                        onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                        Hapus</button> --}}
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
@endsection
