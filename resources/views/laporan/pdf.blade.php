<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan PDF</title>
    <style type="text/css">
        body {
            font-family: "Arial", Helvetica, sans-serif !important;;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #ccc;
            width: 100%;
        }

        .tg td {
            font-family: Arial;
            font-size: 12px;
            padding: 8px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #fff;
        }

        .tg th {
            font-family: Arial;
            font-size: 14px;
            font-weight: normal;
            padding: 8px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #cc685e;
            color: #333;
            background-color: #f0f0f0;
        }

        .tg .tg-3wr7 {
            font-weight: bold;
            font-size: 12px;
            font-family: "Arial", Helvetica, sans-serif !important;;
            text-align: center
        }

        .tg .tg-ti5e {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;;
            text-align: center
        }

        .tg .tg-rv4w {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;
        }

        .report_t {
            width: 100%;
            height: auto;
            text-align: center;
            font-size: 25px;
        }

        .report_c {
            width: 100%;
            height: auto;
            text-align: center;
            font-size: 16px;
            line-height: 18px;
        }

        .logo-l {
            width: 100px;
            height: 100px;
            position: absolute;
            float: left;

        }

        .logo-r {
            width: 100px;
            height: 100px;
            position: absolute;
            float: right;

        }
    </style>
</head>
<body>
@php
    if($bulan == 1){$bln = 'Januari';}
    if($bulan == 2){$bln = 'Febuari';}
    if($bulan == 3){$bln = 'Maret';}
    if($bulan == 4){$bln = 'April';}
    if($bulan == 5){$bln = 'Mei';}
    if($bulan == 6){$bln = 'Juni';}
    if($bulan == 7){$bln = 'Juli';}
    if($bulan == 8){$bln = 'Agustus';}
    if($bulan == 9){$bln = 'September';}
    if($bulan == 10){$bln = 'Oktober';}
    if($bulan == 11){$bln = 'November';}
    if($bulan == 12){$bln = 'Desember';}
    $no = 1;
    $nos = 1;
    if($day == 'Sun'){$dy = 'Minggu';}
    if($day == 'Mon'){$dy = 'Senin';}
    if($day == 'Tue'){$dy = 'Selasa';}
    if($day == 'Wed'){$dy = 'Rabu';}
    if($day == 'Thu'){$dy = 'Kamis';}
    if($day == 'Fri'){$dy = 'Jumat';}
    if($day == 'Sat'){$dy = 'Sabtu';}
@endphp
<img class="logo-l" src="{{public_path()}}/images/assets/ristekdikti.png"/>
<img class="logo-r" src="{{public_path()}}/images/assets/polinela-logo.png"/>
<div class="report_c">KEMENTERIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI<br/>POLITEKNIK NEGERI LAMPUNG</div>
<br/>
<div class="report_t">JURUSAN EKONOMI DAN BISNIS</div>
<br/>
<div align="center">
    <small>Jl. Soekarno – Hatta No 10 Rajabasa – Bandar Lampung, <br/>Telp. (0721) 703995 Fax. (0721) 787309</small>
</div>
<hr>
<br>
<center>DAFTAR KEGIATAN HARIAN</center>
<center>Hari {{$dy}}, Tanggal {{$tgl}} Bulan {{$bln}} {{$tahun}}</center>
<br>
<table class="tg">
    <tr>
        <th align="center"><b>No</b></th>
        <th><b>Nama Kegiatan</b></th>
        <th><b>Pengerja</b></th>
        <th><b>Keterangan</b></th>
    </tr>
    @foreach($laporan_pdf as $lpdf)
        @php
            $tgl = explode('-',$lpdf->created_at);
            $tanggal = $tgl[2].'/'.$tgl[1].'/'.$tgl[0];
        @endphp
        <tr>
            <td align="center">{{$no}}</td>
            <td>{{$lpdf->jenis_tugas}}</td>
            <td>{{$lpdf->user['name']}}</td>
            <td align="center">
                @if($lpdf->status == 1)
                    Sedang di proses
                @elseif($lpdf->status == 2)
                    Sedang di pending
                @elseif($lpdf->status == 3)
                    Selesai
                @else
                    Verified
                @endif
            </td>
        </tr>
        @php
            $no++
        @endphp
    @endforeach
</table>
<br>
<center>RENCANA KEGIATAN YANG AKAN DATANG</center>
<br>
<table class="tg">
    <tr>
        <th align="center"><b>No</b></th>
        <th><b>Nama Kegiatan</b></th>
    </tr>
    @foreach($kegiatan as $kgt)
        <tr>
            <td align="center">{{$nos}}</td>
            <td>{{$kgt}}</td>
        </tr>
        @php
            $nos++
        @endphp
    @endforeach
</table>
<br>
<table width="100%" border="0">
    <tr>
        <td colspan="2">Mengetahui,</td>
    </tr>
    <tr>
        <td width="50%">Ketua Jurusan Ekonomi dan Bisnis,</td>
        <td width="50%" align="right">Yang Membuat,</td>
    </tr>
    <tr>
        <td width="50%" align="left">
            <img src="{{public_path()}}/images/assets/ttd.png"/>
        </td>
        <td colspan="2" height="100px"></td>
    </tr>
    <tr>
        <td width="50%">Ir.Imam Asrowardi, S.Kom., M.Kom.,
            <IPM class=""></IPM>
        </td>
        <td width="50%" align="right">{{ Auth::user()->name }}</td>
    </tr>
</table>
</body>
</html>