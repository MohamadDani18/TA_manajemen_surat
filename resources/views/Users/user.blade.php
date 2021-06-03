@extends('layouts.master')

@section('title')


@section('content')

<!-- Default box -->
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Data Users  <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm pull-right ml-2">Tambah Data</a></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
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
            autoWidth: true,
            ajax: {url:"{{ route('user.index') }}"},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
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
