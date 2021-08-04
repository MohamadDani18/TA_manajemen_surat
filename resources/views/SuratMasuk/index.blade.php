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
                <h5><i class="nav-icon fas fa-envelope my-1 btn-sm-1"></i> Surat Masuk</h5>
                <hr />
            </div>
        </div>
        <div>
            @if (auth()->user()->role == 'admin')
            <div class="col">
                <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{route('suratmasuk.create')}}" role="button"><i class="fas fa-plus"></i>
                    Tambah Data</a>
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
                            <th>Isi Ringkas</th>
                            <th>Asal Surat</th>
                            <th>Kode</th>
                            <th>Tgl. Surat</th>
                            {{--  <th>File</th>  --}}
                            <th>Disposisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($data_suratmasuk as $suratmasuk)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$suratmasuk->no_surat}}</td>
                            <td>{{$suratmasuk->isi}}</td>
                            <td>{{$suratmasuk->asal_surat}}</td>
                            <td>{{$suratmasuk->kode}}</td>
                            <td>{{ \Carbon\Carbon::parse($suratmasuk->tgl_surat)->format('d-m-Y')}}</td>
                            <td>
                                <a href="{{ route('disposisi.index', $suratmasuk->id) }}"
                                    class="btn btn-warning btn-sm my-1 mr-sm-1"><i
                                        class="fas fa-paperclip"></i> Disposisi</a>
                            </td>
                            {{--  <td>
                                @if($suratmasuk->filemasuk!= NULL)
                                   <img src="{{URL::to('/')}}/datasuratmasuk/{{$suratmasuk->filemasuk}}" class="mask waves-effect waves-light rgba-white-slight" height="85px" width="85px" width="auto">
                                @else
                                    <h5 style="color:red">Tidak ada Gambar</h5>
                                @endif
                            </td>  --}}
                            {{-- <td>
                                @php
                                        $status = 0;
                               @endphp
                                @foreach ($disposisi as $item)
                                @if ($suratmasuk->id === $item->suratmasuk_id)
                                    @php
                                        $status = 1;
                                    @endphp
                                    <a href="">{{$tujuan = $item->tujuan}} <br></a>
                                @endif
                                @endforeach
                                @if (auth()->user()->role == 'admin')
                                @if ($status === 0)
                                <a href="{{ route('disposisi.index', $suratmasuk->id) }}"
                                    class="btn btn-warning btn-sm my-1 mr-sm-1"><i
                                        class="fas fa-paperclip"></i> </a>Wait Disposisi
                                @endif
                                @endif
                            </td> --}}
                            <td>
                                <form onsubmit="return confirm('apakah anda yakin?');" action="{{ route('suratmasuk.destroy',$suratmasuk->id) }}" method="POST">

                                    {{--  <a class="btn btn-warning btn-sm my-1 mr-sm-1 btn-block" href="{{ route('disposisi.index',$suratmasuk->id) }}">Disposisi</a>  --}}
                                    <a class="btn btn-primary btn-sm my-1 mr-sm-1 " href="{{ route('suratmasuk.show',$suratmasuk->id) }}">
                                        <i class="fas fa-file-archive"></i> Detail</a>

                                    @if (auth()->user()->role == 'admin')
                                    <a class="btn btn-warning btn-sm my-1 mr-sm-1 " href="{{ route('suratmasuk.edit',$suratmasuk->id) }}"><i class="nav-icon fas fa-edit"></i> Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    {{-- <button type="submit" class="btn btn-danger btn-sm my-1 mr-sm-1 "><i class="nav-icon fas fa-trash"></i> Hapus</button> --}}
                                    @endif
                                </form>
                                {{-- @if (auth()->user()->role == '1')
                                <a href="{{ route('suratmasuk.destroy',$suratmasuk->id) }}"
                                    class="btn btn-danger btn-sm my-1 mr-sm-1 btn-block"
                                    onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                    Hapus</a>
                                @endif --}}
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
