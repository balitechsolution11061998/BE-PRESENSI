<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>A4</title>
    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }

        .header {
            margin-bottom: 20px;
        }

        .header h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .header span {
            font-style: italic;
            font-size: 14px;
        }

        .table-container {
            margin-top: 20px;
        }

        .tabelpresensi {
            width: 100%;
            border-collapse: collapse;
        }

        .tabelpresensi th, .tabelpresensi td {
            border: 1px solid #131212;
            padding: 8px;
            background-color: #dbdbdb;
            font-size: 12px;
        }

        .tabelpresensi th {
            font-weight: bold;
            text-align: center;
        }

        .tabelpresensi td {
            text-align: center;
        }
    </style>
</head>
<body class="A4">
    <?php
    function selisih($jam_masuk, $jam_keluar)
    {
        [$h, $m, $s] = explode(':', $jam_masuk);
        $dtAwal = mktime($h, $m, $s, '1', '1', '1');
        [$h, $m, $s] = explode(':', $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode('.', $totalmenit / 60);
        $sisamenit = $totalmenit / 60 - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ':' . round($sisamenit2);
    }
    ?>
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <div class="header">
            <h3>
                LAPORAN PRESENSI KARYAWAN PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} UNIVERSITAS ANNUQAYAH
            </h3>
            <span>Jl. Bukit Lancaran Pondok Pesantren Annuqayah, Guluk-Guluk, Sumenep, Guluk Guluk Timur I, Guluk-guluk, Kec. Guluk-Guluk, Madura, Jawa Timur 69463</span>
        </div>
        <div class="table-container">
            <table class="tabeldatakaryawan">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ $karyawan->username }}</td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td>{{ $karyawan->name }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $karyawan->jabatan }}</td>
                </tr>
                <tr>
                    <td>Departemen</td>
                    <td>:</td>
                    <td>{{ $karyawan->nama_dept }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>:</td>
                    <td>{{ $karyawan->no_hp }}</td>
                </tr>
            </table>
            <table class="tabelpresensi">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Jml Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presensi as $d)
                        @if ($d->status == 'h')
                            @php
                                $path_in = Storage::url('uploads/absensi/' . $d->foto_in);
                                $path_out = Storage::url('uploads/absensi/' . $d->foto_out);
                                $jamterlambat = selisih($d->jam_masuk, $d->jam_in);
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</td>
                                <td>{{ $d->jam_in }}</td>
                                <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>
                                <td>{{ $d->status }}</td>
                                <td>
                                    @if ($d->jam_in > $d->jam_masuk)
                                        Terlambat {{ $jamterlambat }}
                                    @else
                                        Tepat Waktu
                                    @endif
                                </td>
                                <td>
                                    @if ($d->jam_out != null)
                                        @php
                                            $jmljamkerja = selisih($d->jam_in, $d->jam_out);
                                        @endphp
                                    @else
                                        @php
                                            $jmljamkerja = 0;
                                        @endphp
                                    @endif
                                    {{ $jmljamkerja }}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $d->status }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <table width="100%">
                <tr>
                    <td colspan="2" style="text-align: right">Sumenep, {{ date('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td style="text-align: right; vertical-align:bottom" height="100px">
                        <u>Bahrul Ulum</u><br>
                        <i><b>Kepala Biro SDM</b></i>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>
