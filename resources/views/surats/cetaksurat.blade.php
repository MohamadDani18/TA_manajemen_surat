
<!DOCTYPE html>
<html>
<head>
	<title>CETAK SURAT</title>
	<style type="text/css">
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
</head>
<body>
    @foreach($surat as $s)
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
				<td colspan="2"><hr></td>
			</tr>
		<table width="625">
			<tr>
				<td class="text2">{{$s->tempat_surat}}, {{ \Carbon\Carbon::parse($s->tgl_surat)->translatedFormat('d F Y')}}</td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td>Nomor</td>
				<td width="572"> : {{$s->no_surat}}</td>
			</tr>
            <tr>
				<td>Lamp</td>
				<td width="564"> : {{$s->lampiran}}</td>
			</tr>
			<tr>
				<td>Perihal</td>
				<td width="564"> : {{$s->perihal}}</td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Kpd yth.<br>{{$s->tujuan_surat}}<br>Di tempat</font>
		       </td>
		    </tr>
		</table>
		<br>
        {{-- <table width="625">
			<tr>
		       <td>
			       <center><font size="3">SURAT EDARAN</font></center>
		       </td>
		    </tr>
		</table>
		<br> --}}
		<table width="625">
			<tr>
		       <td>
			       <font size="2">{{$s->salam_pembuka}}<br>{{$s->isi}}</font>
		       </td>
		    </tr>
		</table>
		<br>
		</table>
		<table>
			<tr class="text2">
				<td>Hari Tanggal</td>
				<td width="525">: {{$s->hari_tgl}}</td>
			</tr>
			<tr>
				<td>Jam</td>
				<td width="525">: {{$s->waktu}}</td>
			</tr>
			<tr>
				<td>Tempat</td>
				<td width="525">: {{$s->tempat}}</td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">{{$s->salam_penutup}}</font>
		       </td>
		    </tr>
		</table>
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Dinas<br><img src="{{asset('adminLTE/')}}/dist/img/ttd.png" width="60" height="60"><br>Basuki, S.E.,M.M</td>
			</tr>
	     </table>
         <table>
			<tr class="625">
				<td>Tembusan :</td>
                <?php $no = 0;?>
                @foreach($s->tembusan as $t)
                <?php $no++ ;?>
                <tr>

                    <td width="600" >
                        {{$no}}. {{$t->tembusan}} <br>
                        @endforeach
                    </td>
                </tr><br>
			</tr>

		</table>
	</center>
    @endforeach
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>

