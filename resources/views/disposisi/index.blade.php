@extends('layouts.master')

@section('title')


@section('content')

<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Disposisi <a href="{{ route('disposisi.create') }}" class="btn btn-primary btn-sm pull-right ml-2">Tambah Data</a></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Disposisi</th>
                        <th>Isi Disposisi</th>
                        <th>Sifat</th>
                        <th>Batas waktu</th>
                        <th>Action</th>
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
            ajax: {url:"{{ route('disposisi.index') }}"},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'tujuan_disposisi', name: 'tujuan_disposisi'},
                {data: 'isi_disposisi', name: 'isi_disposisi'},
                {data: 'sifat', name: 'sifat'},
                {data: 'batas_waktu', name: 'batas_waktu'},
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
