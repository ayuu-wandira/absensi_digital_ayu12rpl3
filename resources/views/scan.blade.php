@extends('layouts.app')

@section('title', 'AbsensiKu - Absen Sekarang')

@section('content')
    <!-- TOPBAR KHUSUS HALAMAN INI -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Absen Kehadiran Siswa / Karyawan</h3>
            <p class="text-muted small mb-0">Arahkan kamera ke QR Code atau gunakan opsi simulasi di bawah jika kamera tidak tersedia.</p>
        </div>
        <div class="text-end d-none d-md-block">
            <span class="fw-bold text-dark">Rabu, 23 September 2026</span>
        </div>
    </div>

    <!-- KONTEN UTAMA HALAMAN ABSENSI -->
    <div class="card card-custom p-4 mb-4">
        <div class="text-center py-4">
            <h5 class="fw-bold text-primary mb-3"><i class="bi bi-camera me-2"></i>Scanner Kamera QR Code</h5>
            
            <div class="p-5 bg-light rounded-4 d-inline-block mb-3 border">
                <i class="bi bi-qr-code-scan display-4 text-muted"></i>
            </div>
            
            <div class="mb-3">
                <button class="btn btn-outline-secondary btn-sm px-3 rounded-pill me-2">Request Camera Permissions</button>
                <a href="#" class="small text-decoration-none">Scan an Image File</a>
            </div>

            <!-- TOMBOL SIMULASI YANG SUDAH AKTIF -->
            <div class="mt-4 pt-3 border-top">
                <p class="text-muted small mb-2"><i class="bi bi-lightning-charge text-warning me-1"></i> Opsi Simulasi (Tanpa Kamera):</p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('attendance.simulate') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3 text-decoration-none">
                        <i class="bi bi-play-circle me-1"></i> Simulasi Absen Masuk
                    </a>
                    <a href="{{ route('attendance.simulate.late') }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 text-decoration-none">
                        <i class="bi bi-clock-history me-1"></i> Simulasi Terlambat
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-3 border-top">
            <label class="form-label small fw-semibold text-muted">Atau Masukkan Kode / NIS / NIP Manual:</label>
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill px-3" placeholder="Contoh: ABSEN-2025-001">
                <button class="btn btn-primary rounded-end-pill px-4" type="button">Kirim</button>
            </div>
        </div>
    </div>

    <!-- PETUNJUK PENGGUNAAN -->
    <div class="card card-custom p-4">
        <h6 class="fw-bold mb-2"><i class="bi bi-info-circle text-primary me-2"></i>Petunjuk Penggunaan</h6>
        <p class="text-muted small mb-0">Pastikan kamera mendeteksi QR Code dengan jelas atau gunakan tombol simulasi jika Anda sedang melakukan pengujian sistem secara lokal.</p>
    </div>
@endsection