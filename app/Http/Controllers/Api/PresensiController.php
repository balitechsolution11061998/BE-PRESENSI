<?php

namespace App\Http\Api\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PresensiController extends Controller
{
    public function store(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $hariini = date("Y-m-d");
        $jamsekarang = date("H:i");
        $tgl_sebelumnya = date('Y-m-d', strtotime("-1 days", strtotime($hariini)));
        $cekpresensi_sebelumnya = DB::table('presensi')
            ->join('jam_kerja', 'presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('tgl_presensi', $tgl_sebelumnya)
            ->where('nik', $nik)
            ->first();

        $ceklintashari_presensi = $cekpresensi_sebelumnya != null  ? $cekpresensi_sebelumnya->lintashari : 0;

        $kode_cabang = Auth::guard('karyawan')->user()->kode_cabang;
        $kode_dept = Auth::guard('karyawan')->user()->kode_dept;
        $tgl_presensi = $ceklintashari_presensi == 1 && $jamsekarang < "08:00" ? $tgl_sebelumnya : date("Y-m-d");
        $jam = date("H:i:s");
        $lok_kantor = DB::table('cabang')->where('kode_cabang', $kode_cabang)->first();
        $lok = explode(",", $lok_kantor->lokasi_cabang);
        $latitudekantor = $lok[0];
        $longitudekantor = $lok[1];
        $lokasi = $request->lokasi;
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];

        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);

        //Cek Jam Kerja Karyawan
        $namahari = $this->gethari(date('D', strtotime($tgl_presensi)));

        //Cek Jam Kerja By Date
        $jamkerja = DB::table('konfigurasi_jamkerja_by_date')
            ->join('jam_kerja', 'konfigurasi_jamkerja_by_date.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nik', $nik)
            ->where('tanggal', $hariini)
            ->first();

        //Jika Tidak Memiliki Jam Kerja By Date
        if ($jamkerja == null) {
            //Cek Jam Kerja harian / Jam Kerja Khusus / Jam Kerja Per Orangannya
            $jamkerja = DB::table('konfigurasi_jamkerja')
                ->join('jam_kerja', 'konfigurasi_jamkerja.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
                ->where('nik', $nik)->where('hari', $namahari)->first();

            // Jika Jam Kerja Harian Kosong
            if ($jamkerja == null) {
                $jamkerja = DB::table('konfigurasi_jk_dept_detail')
                    ->join('konfigurasi_jk_dept', 'konfigurasi_jk_dept_detail.kode_jk_dept', '=', 'konfigurasi_jk_dept.kode_jk_dept')
                    ->join('jam_kerja', 'konfigurasi_jk_dept_detail.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
                    ->where('kode_dept', $kode_dept)
                    ->where('kode_cabang', $kode_cabang)
                    ->where('hari', $namahari)->first();
            }
        }

        $presensi = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nik', $nik);
        $cek = $presensi->count();
        $datapresensi = $presensi->first();
        if ($cek > 0) {
            $ket = "out";
        } else {
            $ket = "in";
        }
        $image = $request->image;
        $folderPath = "public/uploads/absensi/";
        $formatName = $nik . "-" . $tgl_presensi . "-" . $ket;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;

        $tgl_pulang = $jamkerja->lintashari == 1 ? date('Y-m-d', strtotime("+ 1 days", strtotime($tgl_presensi))) : $tgl_presensi;
        $jam_pulang = $hariini . " " . $jam;
        $jamkerja_pulang = $tgl_pulang . " " . $jamkerja->jam_pulang;
        $datakaryawan = DB::table('karyawan')->where('nik', $nik)->first();
        $no_hp = $datakaryawan->no_hp;
        if ($radius > $lok_kantor->radius_cabang) {
            return response()->json([
                'status' => 'error',
                'message' => "Maaf Anda Berada Diluar Radius, Jarak Anda " . $radius . " meter dari Kantor",
                'type' => 'radius'
            ], 400);
        } else {
            if ($cek > 0) {
                if ($jam_pulang < $jamkerja_pulang) {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Maaf Belum Waktunya Pulang",
                        'type' => 'out'
                    ], 400);
                } else if (!empty($datapresensi->jam_out)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => "Anda Sudah Melakukan Absen Pulang Sebelumnya !",
                        'type' => 'out'
                    ], 400);
                } else {
                    $data_pulang = [
                        'jam_out' => $jam,
                        'foto_out' => $fileName,
                        'lokasi_out' => $lokasi
                    ];
                    $update = DB::table('presensi')->where('tgl_presensi', $tgl_presensi)->where('nik', $nik)->update($data_pulang);
                    if ($update) {
                        Storage::put($file, $image_base64);

                        // Kirim pesan dengan cURL
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://wagateway.pedasalami.com/send-message',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('message' => 'Terimakasih Sudah Melakukan Absen Pulang, Anda Melakukan Absen Pada Jam ' . $jam, 'number' => $no_hp, 'file_dikirim' => ''),
                        ));
                        
                        $response = curl_exec($curl);
                        curl_close($curl);
                        
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Terimkasih, Hati Hati Di Jalan',
                            'type' => 'out'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Maaf Gagal absen, Hubungi Tim IT',
                            'type' => 'out'
                        ], 500);
                    }
                }
            } else {
                if ($jam < $jamkerja->awal_jam_masuk) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Maaf Belum Waktunya Melakukan Presensi',
                        'type' => 'in'
                    ], 400);
                } else if ($jam > $jamkerja->akhir_jam_masuk) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Maaf Waktu Untuk Presensi Sudah Habis',
                        'type' => 'in'
                    ], 400);
                } else {
                    $data = [
                        'nik' => $nik,
                        'tgl_presensi' => $tgl_presensi,
                        'jam_in' => $jam,
                        'foto_in' => $fileName,
                        'lokasi_in' => $lokasi,
                        'kode_jam_kerja' => $jamkerja->kode_jam_kerja,
                        'status' => 'h'
                    ];
                    $simpan = DB::table('presensi')->insert($data);
                    if ($simpan) {
                        Storage::put($file, $image_base64);

                        // Kirim pesan dengan cURL
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://wagateway.pedasalami.com/send-message',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('message' => 'Terimakasih Sudah Melakukan Absen Masuk, Anda Melakukan Absen Pada Jam ' . $jam, 'number' => $no_hp, 'file_dikirim' => ''),
                        ));
                        
                        $response = curl_exec($curl);
                        curl_close($curl);
                        
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Terimkasih, Selamat Bekerja',
                            'type' => 'in'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Maaf Gagal absen, Hubungi Tim IT',
                            'type' => 'in'
                        ], 500);
                    }
                }
            }
        }
    }
}
