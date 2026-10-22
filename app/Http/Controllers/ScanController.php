<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class ScanController extends Controller
{
    // Halaman Tampilan Kamera QR Scanner
    public function index()
    {
        return view('scan');
    }

    // Proses Simpan Absensi dari Scan QR Code
    public function store(Request $request)
    {
        $request->validate([
            'qr_code' => 'required'
        ]);

        // Cek apakah siswa sudah absen hari ini
        $today = date('Y-m-d');
        $alreadyAttended = Attendance::where('date', $today)->exists();

        if ($alreadyAttended) {
            return response()->json([
                'status'  => 'warning',
                'message' => 'Kamu sudah melakukan presensi hari ini!'
            ]);
        }

        // Simpan data absensi baru
        Attendance::create([
            'date'   => $today,
            'time'   => date('H:i:s'),
            'status' => 'hadir'
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Presensi Berhasil Dikirim! Terhitung Hadir.'
        ]);
    }
}