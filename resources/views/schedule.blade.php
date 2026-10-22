@extends('layouts.app')

@section('title', 'AbsensiKu - Jadwal Sekolah')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Jadwal Kehadiran & Pelajaran</h3>
        <p class="text-muted small mb-0">Daftar jam masuk sekolah dan kegiatan harian kamu.</p>
    </div>

    <div class="card card-custom p-4">
        <h5 class="fw-bold mb-4"><i class="bi bi-calendar-event text-primary me-2"></i>Jadwal Jam Masuk & Pulang Sekolah</h5>

        <div class="d-flex flex-column gap-3">
            <!-- Senin -->
            <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Senin</h6>
                    <p class="text-muted small mb-0"><i class="bi bi-clock me-1"></i> Masuk: 06.30 WIB - Upacara Bendera | Pulang: 15.00 WIB</p>
                </div>
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Aktif</span>
            </div>

            <!-- Selasa - Kamis -->
            <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Selasa – Kamis</h6>
                    <p class="text-muted small mb-0"><i class="bi bi-clock me-1"></i> Masuk: 06.30 WIB - Kegiatan Belajar Mengajar | Pulang: 15.00 WIB</p>
                </div>
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Aktif</span>
            </div>

            <!-- Jumat -->
            <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Jumat</h6>
                    <p class="text-muted small mb-0"><i class="bi bi-clock me-1"></i> Masuk: 06.30 WIB - Senam / Kegiatan Keagamaan | Pulang: 13.00 WIB</p>
                </div>
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Aktif</span>
            </div>

            <!-- Sabtu & Minggu -->
            <div class="p-3 bg-light rounded-4 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Sabtu & Minggu</h6>
                    <p class="text-muted small mb-0"><i class="bi bi-calendar-x me-1"></i> Libur Akhir Pekan</p>
                </div>
                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-1 rounded-pill">Libur</span>
            </div>
        </div>
    </div>
@endsection