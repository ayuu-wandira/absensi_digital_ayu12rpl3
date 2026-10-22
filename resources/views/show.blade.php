@extends('layouts.app')

@section('title', 'AbsensiKu - Dashboard')

@section('content')
    <!-- HEADER KONTEN -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Selamat pagi, Ayu! 👋</h3>
            <p class="text-muted small mb-0">Semoga harimu menyenangkan dan tetap semangat!</p>
        </div>
        <div class="text-end d-none d-md-block">
            <span class="fw-bold text-dark">Rabu, 23 September 2026</span>
            <div class="text-muted" style="font-size: 0.75rem;">Kerja keras hari ini, hasil luar biasa nanti ✨</div>
        </div>
    </div>

    <!-- ROW UTAMA: KIRI (ABSEN) & KANAN (KALENDER) -->
    <div class="row g-4 mb-4">
        <!-- Kolom Kiri: Jam Absen, Status, & Statistik -->
        <div class="col-lg-8">
            <!-- Row Jam & Status -->
            <div class="row g-4 mb-4">
                <!-- Waktu Sekarang & Tombol Absen -->
                <div class="col-md-6">
                    <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill mb-3">
                                <span class="spinner-grow spinner-grow-sm me-1" role="status"></span> Waktu Sekarang
                            </span>
                            <h1 class="fw-bold display-6 text-dark mb-1" id="realtime-clock">12:08:06</h1>
                            <p class="text-muted small">Rabu, 23 September 2026</p>
                        </div>
                        <div>
                            <a href="{{ url('/scan') }}" class="btn btn-primary btn-lg w-100 py-3 rounded-4 shadow-sm fw-semibold d-flex align-items-center justify-content-center text-decoration-none">
                                <i class="bi bi-fingerprint fs-4 me-2"></i> Absen Masuk
                            </a>
                            <div class="text-center text-muted" style="font-size: 0.8rem;">Jam kerja: 08:00 - 17:00 WIB</div>
                        </div>
                    </div>
                </div>

                <!-- Status Hari Ini (Dinamis dari Session Simulasi) -->
                <div class="col-md-6">
                    <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <span class="text-muted small">Status Hari Ini</span>
                            @if(session('is_attended'))
                                @if(session('attendance_status') == 'Hadir')
                                    <h4 class="fw-bold text-success mt-1 mb-2">
                                        <i class="bi bi-check-circle-fill me-1"></i> Sudah Absen (Hadir)
                                    </h4>
                                @else
                                    <h4 class="fw-bold text-warning mt-1 mb-2">
                                        <i class="bi bi-clock-history me-1"></i> Terlambat
                                    </h4>
                                @endif
                                <p class="text-muted small mb-3">Tercatat pukul {{ session('attendance_time') }} WIB</p>
                            @else
                                <h4 class="fw-bold text-danger mt-1 mb-2">
                                    <i class="bi bi-x-circle-fill me-1"></i> Belum Absen
                                </h4>
                                <p class="text-muted small mb-3">Ayo lakukan absensi untuk memulai hari ini!</p>
                            @endif
                        </div>
                        <div class="p-3 bg-light rounded-4 border-start {{ session('is_attended') ? (session('attendance_status') == 'Hadir' ? 'border-success' : 'border-warning') : 'border-danger' }} border-4">
                            <p class="text-secondary fst-italic small mb-0">
                                "Kedisiplinan adalah jembatan antara tujuan dan pencapaian."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Kehadiran -->
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="bi bi-bar-chart-fill text-primary me-2"></i>Statistik Kehadiran</h5>
                    <span class="text-muted small bg-light px-3 py-1 rounded-pill">September 2026 <i class="bi bi-chevron-down ms-1"></i></span>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4">
                            <span class="text-muted small"><i class="bi bi-person-check text-success me-1"></i> Hadir</span>
                            <h3 class="fw-bold text-success mt-1 mb-0">18 <span class="fs-6 fw-normal text-muted">hari</span></h3>
                            <small class="text-success" style="font-size: 0.75rem;">↗ +2 dari bulan lalu</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4">
                            <span class="text-muted small"><i class="bi bi-clock-history text-warning me-1"></i> Terlambat</span>
                            <h3 class="fw-bold text-warning mt-1 mb-0">2 <span class="fs-6 fw-normal text-muted">hari</span></h3>
                            <small class="text-danger" style="font-size: 0.75rem;">↘ -1 dari bulan lalu</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4">
                            <span class="text-muted small"><i class="bi bi-file-earmark-text text-primary me-1"></i> Izin</span>
                            <h3 class="fw-bold text-primary mt-1 mb-0">1 <span class="fs-6 fw-normal text-muted">hari</span></h3>
                            <small class="text-muted" style="font-size: 0.75rem;">Sama seperti bulan lalu</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4">
                            <span class="text-muted small"><i class="bi bi-x-circle text-danger me-1"></i> Tidak Hadir</span>
                            <h3 class="fw-bold text-danger mt-1 mb-0">0 <span class="fs-6 fw-normal text-muted">hari</span></h3>
                            <small class="text-success" style="font-size: 0.75rem;">↘ -2 dari bulan lalu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Kalender Absensi -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0"><i class="bi bi-calendar-event text-primary me-2"></i>Kalender Absensi</h6>
                    <a href="#" class="text-decoration-none small text-primary">Lihat Detail</a>
                </div>
                
                <div class="text-center mb-3">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <button class="btn btn-sm btn-light rounded-circle"><i class="bi bi-chevron-left"></i></button>
                        <span class="fw-bold text-dark">September 2026</span>
                        <button class="btn btn-sm btn-light rounded-circle"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>

                <!-- Mini Kalender Grid -->
                <div class="table-responsive">
                    <table class="table table-borderless text-center small mb-0" style="font-size: 0.85rem;">
                        <thead>
                            <tr class="text-muted">
                                <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-muted">30</td><td class="text-muted">31</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
                            </tr>
                            <tr>
                                <td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
                            </tr>
                            <tr>
                                <td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
                            </tr>
                            <tr>
                                <td>20</td><td>21</td><td>22</td>
                                <td><span class="bg-primary text-white rounded-circle d-inline-block" style="width: 26px; height: 26px; line-height: 26px;">23</span></td>
                                <td>24</td><td>25</td><td>26</td>
                            </tr>
                            <tr>
                                <td>27</td><td>28</td><td>29</td><td>30</td><td class="text-muted">1</td><td class="text-muted">2</td><td class="text-muted">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW BAWAH: RIWAYAT ABSENSI & INFORMASI -->
    <div class="row g-4">
        <!-- Tabel Riwayat -->
        <div class="col-lg-8">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0"><i class="bi bi-clock-history text-primary me-2"></i>Riwayat Absensi</h5>
                    <a href="{{ route('attendance.history') }}" class="text-decoration-none small text-primary">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light text-muted small">
                            <tr>
                                <th class="py-3 rounded-start">Tanggal</th>
                                <th>Hari</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Status</th>
                                <th class="rounded-end">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            <tr>
                                <td class="fw-semibold">23 Sep 2026</td>
                                <td>Rabu</td>
                                <td>{{ session('is_attended') ? session('attendance_time') : '-' }}</td>
                                <td>-</td>
                                <td>
                                    @if(session('is_attended'))
                                        @if(session('attendance_status') == 'Hadir')
                                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i> Hadir</span>
                                        @else
                                            <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i> Terlambat</span>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i> Belum Absen</span>
                                    @endif
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">22 Sep 2026</td>
                                <td>Selasa</td>
                                <td>07:55</td>
                                <td>17:02</td>
                                <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i> Hadir</span></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">21 Sep 2026</td>
                                <td>Senin</td>
                                <td>08:15</td>
                                <td>17:00</td>
                                <td><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1"><i class="bi bi-circle-fill me-1" style="font-size: 6px;"></i> Terlambat</span></td>
                                <td>Macet</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Informasi & Pengumuman -->
        <div class="col-lg-4">
            <div class="card card-custom p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0"><i class="bi bi-megaphone text-primary me-2"></i>Informasi</h6>
                    <a href="#" class="text-decoration-none small text-primary">Lihat Semua</a>
                </div>

                <div class="d-flex flex-column gap-3">
                    <div class="p-3 bg-light rounded-3">
                        <div class="fw-semibold small text-dark mb-1">Pengumuman Jadwal Libur Nasional</div>
                        <div class="text-muted" style="font-size: 0.75rem;">20 Sep 2026</div>
                    </div>
                    <div class="p-3 bg-light rounded-3">
                        <div class="fw-semibold small text-dark mb-1">Update Sistem Absensi v1.0</div>
                        <div class="text-muted" style="font-size: 0.75rem;">15 Sep 2026</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Jam Realtime -->
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const clockElement = document.getElementById('realtime-clock');
            if (clockElement) {
                clockElement.textContent = `${hours}:${minutes}:${seconds}`;
            }
        }
        setInterval(updateClock, 1000);
    </script>
@endsection