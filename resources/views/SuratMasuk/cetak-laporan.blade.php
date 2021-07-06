<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        table.static{
            position: relative;
            border: 1px solid #543535;
        }

    </style>
    <title>CETAK DATA SURAT</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Surat</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No.</th>
                <th>Asal Surat</th>
                <th>No Surat</th>
                <th>Isi RIngkas</th>
                <th>Kode Klasifikasi</th>
                <th>tanggal Surat</th>
            </tr>

            @foreach ($suratmasuk as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->asal_surat}}</td>
                    <td>{{$s->no_surat}}</td>
                    <td>{{$s->isi}}</td>
                    <td>{{$s->kode}}</td>
                    <td>{{$s->tgl_surat}}</td>
                </tr>
            @endforeach

        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
