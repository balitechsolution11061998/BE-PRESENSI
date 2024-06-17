<?php

namespace App\Exports;

use App\Models\Presensi;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class PresensiExport implements FromView
{
    protected $bulan;
    protected $tahun;
    protected $nik;

    public function __construct($bulan, $tahun,$nik)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->nik = $nik;
    }

    public function view(): View
    {
        $presensi = DB::table('presensi')
        ->select('presensi.*', 'keterangan', 'jam_kerja.*')
        ->leftJoin('jam_kerja', 'presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
        ->leftJoin('pengajuan_izin', 'presensi.kode_izin', '=', 'pengajuan_izin.kode_izin')
        ->where('presensi.nik', $this->nik)
        ->whereRaw('MONTH(tgl_presensi)="' . $this->bulan . '"')
        ->whereRaw('YEAR(tgl_presensi)="' . $this->tahun . '"')
        ->orderBy('tgl_presensi')
        ->get();
        $karyawan = $this->getKaryawan(); // Replace with your actual logic to fetch karyawan data
        $namabulan = $this->getMonthName($this->bulan); // Assuming you have a method to get month name

        return view('presensi.cetaklaporanexcel', compact('presensi', 'karyawan', 'namabulan', 'bulan', 'tahun'));
    }

    private function getKaryawan()
    {
        // Replace this with your actual logic to fetch karyawan data
        return DB::table('users')->where('username', $this->nik)
        ->join('departemen', 'users.kode_dept', '=', 'departemen.kode_dept')
        ->first();
    }

    private function getMonthName($monthNumber)
    {
        // Return month name based on the month number
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        return $months[$monthNumber] ?? 'Unknown';
    }
}
