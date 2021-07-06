@extends('layouts.master')

@section('title')


@section('content')

<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Surat Keluar  <a href="{{ route('suratkeluar.create') }}" class="btn btn-primary btn-sm pull-right ml-2">Tambah Data</a></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No.</th>
                            <th>No. Surat</th>
                            <th>Isi Ringkas</th>
                            <th>Tujuan Surat</th>
                            <th>Kode</th>
                            <th>Tgl. Surat</th>
                            {{--  <th>File</th>  --}}
                            <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
  <!-- /.card -->


  <script>
    $(document).ready(function(){
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {url:"{{ route('suratkeluar.index') }}"},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'no_surat', name: 'no_surat'},
                {data: 'isi', name: 'isi'},
                {data: 'tujuan_surat', name: 'tujuan_surat'},
                {data: 'kode', name: 'kode'},
                {data: 'tgl_surat', name: 'tgl_surat'},
                // { data: 'filekeluar', name: 'filekeluar',
                //     render: function( data, type, full, meta ) {
                //         return "<img src=\"" + data + "\" height=\"50\"/>";
                //     }
                // },
                {data: 'action', name: 'action',orderable : false, searchable: false}
            ]
          });
        });
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
