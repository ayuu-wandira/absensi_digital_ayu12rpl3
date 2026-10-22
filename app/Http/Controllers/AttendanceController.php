<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $userId = Auth::id() ?? 1;
        $attendances = Attendance::where('user_id', $userId)->get();
        return view('attendance.index', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        $userId = Auth::id() ?? 1;
        $now = Carbon::now();
        $today = $now->toDateString();

        // Cek apakah sudah absen hari ini
        $existing = Attendance::where('user_id', $userId)->whereDate('date', $today)->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah absen masuk hari ini.');
        }

        // Penentuan status (terlambat jika di atas jam 08:00)
        $status = $now->format('H:i') > '08:00' ? 'terlambat' : 'hadir';

        Attendance::create([
            'user_id' => $userId,
            'date'    => $today,
            'time_in' => $now->toTimeString(),
            'status'  => $status,
        ]);

        return back()->with('success', 'Berhasil Absen Masuk!');
    }

    public function checkOut(Request $request)
    {
        $userId = Auth::id() ?? 1;
        $now = Carbon::now();
        $today = $now->toDateString();

        $attendance = Attendance::where('user_id', $userId)->whereDate('date', $today)->first();

        if (!$attendance) {
            return back()->with('error', 'Kamu belum absen masuk hari ini.');
        }

        $attendance->update([
            'time_out' => $now->toTimeString(),
        ]);

        return back()->with('success', 'Berhasil Absen Pulang!');
    }

    // Method untuk menampilkan riwayat absensi
    public function history()
    {
        $userId = Auth::id() ?? 1;
        $attendances = Attendance::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        return view('history', compact('attendances'));
    }
}