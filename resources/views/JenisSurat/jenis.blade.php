@extends('layouts.master')

@section('title')

@section('content')

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-user-alt mr-1"></i>Data Jenis Surat <a href="{{ route('jenissurat.create') }}" class="btn btn-primary btn-sm pull-right ml-2">Tambah Data</a></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("jenissurat.index") }}'
            },
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis_surat', name: 'jenis_surat'},
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
