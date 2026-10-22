@extends('layouts.app')

@section('title', 'AbsensiKu - Pengaturan Aplikasi')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Pengaturan Aplikasi</h3>
        <p class="text-muted small mb-0">Kelola preferensi akun, notifikasi, dan keamanan sistem.</p>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Notifikasi & Keamanan -->
        <div class="col-lg-8">
            <div class="card card-custom p-4 mb-4">
                <h5 class="fw-bold mb-4"><i class="bi bi-bell text-primary me-2"></i>Pengaturan Notifikasi</h5>
                
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <div>
                        <h6 class="fw-semibold mb-1 small">Pengingat Absen Masuk</h6>
                        <p class="text-muted small mb-0">Kirimkan notifikasi 15 menit sebelum jam masuk kerja.</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked style="width: 40px; height: 20px;">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <h6 class="fw-semibold mb-1 small">Pengingat Absen Pulang</h6>
                        <p class="text-muted small mb-0">Kirimkan notifikasi saat jam kerja selesai.</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked style="width: 40px; height: 20px;">
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3">
                    <div>
                        <h6 class="fw-semibold mb-1 small">Pengumuman & Informasi Sekolah</h6>
                        <p class="text-muted small mb-0">Notifikasi terkait libur nasional dan info penting lainnya.</p>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked style="width: 40px; height: 20px;">
                    </div>
                </div>
            </div>

            <!-- Keamanan Akun -->
            <div class="card card-custom p-4">
                <h5 class="fw-bold mb-4"><i class="bi bi-shield-lock text-primary me-2"></i>Keamanan Akun</h5>
                
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-muted">Kata Sandi Saat Ini</label>
                    <input type="password" class="form-control" placeholder="Masukkan sandi lama...">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Kata Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="Masukkan sandi baru...">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Konfirmasi Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="Ulangi sandi baru...">
                    </div>
                </div>

                <button class="btn btn-primary px-4 py-2 rounded-3 fw-semibold">Perbarui Sandi</button>
            </div>
        </div>

        <!-- Kolom Kanan: Info Aplikasi -->
        <div class="col-lg-4">
            <div class="card card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-info-circle text-primary me-2"></i>Tentang AbsensiKu</h5>
                <p class="text-muted small mb-3">AbsensiKu adalah aplikasi manajemen kehadiran modern yang dirancang untuk mempermudah pencatatan harian secara digital, cepat, dan akurat.</p>
                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
                    <span class="small text-muted">Versi Aplikasi</span>
                    <span class="fw-bold text-dark small">v1.0.0 Stable</span>
                </div>
            </div>
        </div>
    </div>
@endsection