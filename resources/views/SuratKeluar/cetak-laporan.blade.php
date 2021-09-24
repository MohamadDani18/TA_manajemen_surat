<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        table.static{
            position: relative;
            border: 1px solid #543535;
        }

        table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

    </style>
    <title>CETAK DATA SURAT</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <td><img src="{{asset('adminLTE/')}}/dist/img/logocapil.png" width="70" height="80"></td>
                <td>
                <center>
                    <font size="4">PEMERINTAHAN KOTA TEGAL</font><br>
                    <font size="5"><b>DINAS KEPENDUDUKAN KOTA TEGAL</b></font><br>
                    {{-- <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br> --}}
                    <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
                </center>
                </td>
            </tr>
            <tr>
                <b><td colspan="2"><hr></td></b>
            </tr>
        </table>
        </center>
    <div class="form-group">
        <p align="center"><b>Laporan Data Surat</b></p>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Tujuan Surat</th>
                <th>No Surat</th>
                <th>Perihal</th>
                <th>Klasifikasi Surat</th>
                <th>tanggal Surat</th>
                <th>Status</th>
            </tr>

            @foreach ($suratkeluar as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->tujuan_surat}}</td>
                    <td>{{$s->no_surat}}</td>
                    <td>{{$s->perihal}}</td>
                    <td>{{$s->jenis_surat}}</td>
                    <td>{{ \Carbon\Carbon::parse($s->tgl_surat)->format('d-m-Y')}}</td>
                    <td>{{$s->keterangan}}</td>
                </tr>
            @endforeach

        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
