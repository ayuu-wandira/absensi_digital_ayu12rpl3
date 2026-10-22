<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsensiKu - Dashboard</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Menghilangkan elemen card di bagian paling bawah sidebar secara mutlak */
.sidebar > div:last-child:not(:first-child) {
    display: none !important;
}

        :root {
            --sidebar-width: 240px;
            --bg-main: #f3f6fb;
            --sidebar-bg: #1e293b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-main);
            color: #334155;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            z-index: 100;
        }

        .sidebar .brand-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #94a3b8;
            padding: 10px 16px;
            font-weight: 500;
            border-radius: 10px;
            margin: 2px 12px;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #334155;
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            margin-right: 12px;
        }

        /* Main Content area */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            padding: 20px 30px;
        }

        /* Top Header Area */
        .search-input {
            background-color: #e2e8f0;
            border: none;
            border-radius: 12px;
            padding: 8px 16px 8px 40px;
            font-size: 0.9rem;
            width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        /* Card Styles */
        .card-custom {
            border: none;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 2px 12px rgba(0,0,0,0.02);
            transition: transform 0.2s;
        }

        .btn-absen {
            background-color: #2563eb;
            color: #fff;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            border: none;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
            transition: all 0.2s;
        }

        .btn-absen:hover {
            background-color: #1d4ed8;
            color: #fff;
        }

        /* Custom Stats Badge Colors */
        .bg-stat-hadir { background-color: #e6f4ea; color: #1e8e3e; }
        .bg-stat-terlambat { background-color: #fef7e0; color: #b06000; }
        .bg-stat-izin { background-color: #e8f0fe; color: #1a73e8; }
        .bg-stat-alpa { background-color: #fce8e6; color: #d93025; }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Mini Calendar */
        .calendar-table th {
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 600;
            text-align: center;
        }
        .calendar-table td {
            font-size: 0.85rem;
            text-align: center;
            padding: 6px;
            border: none;
        }
        .calendar-table .active-day {
            background-color: #2563eb;
            color: #fff;
            border-radius: 50%;
            font-weight: 600;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status.hadir { background-color: #d1fae5; color: #065f46; }
        .badge-status.terlambat { background-color: #fef3c7; color: #92400e; }
        .badge-status.belum { background-color: #e2e8f0; color: #475569; }
        .badge-status.libur { background-color: #dbeafe; color: #1e40af; }
}
    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <div class="sidebar d-flex flex-column justify-content-between p-3">
        <div>
            <!-- Logo -->
            <div class="d-flex align-items-center gap-2 mb-4 px-2">
                <div class="bg-primary text-white p-2 rounded-3 d-flex align-items-center justify-content-center">
                    <i class="bi bi-shield-check fs-5"></i>
                </div>
                <span class="brand-title">AbsensiKu</span>
            </div>

            <!-- Menu Navigation -->
            <ul class="nav nav-pills flex-column">
                <li class="nav-item"><a href="{{ route('attendance.index') }}" class="nav-link active"><i class="bi bi-grid-fill"></i> Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('scan.index') }}" class="nav-link"><i class="bi bi-calendar-check"></i> Absensi</a></li>
                <li class="nav-item"><a href="{{ route('attendance.history') }}" class="nav-link"><i class="bi bi-clock-history"></i> Riwayat</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-calendar3"></i> Jadwal</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bar-chart-line"></i> Rekapitulasi</a></li>
                <li class="nav-item"><a href="{{ route('permission.index') }}" class="nav-link"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
                <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link"><i class="bi bi-person"></i> Profil</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-gear"></i> Pengaturan</a></li>
            </ul>
        </div>
        <div class="px-2 text-muted small text-center pb-2">v1.0.0</div>
    </div>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        
        <!-- TOPBAR BARIS PERTAMA -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Search Bar -->
            <div class="position-relative">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="form-control search-input" placeholder="Cari menu, riwayat, atau informasi...">
            </div>

            <!-- Profile & Notification Header -->
            <div class="d-flex align-items-center gap-3">
                <div class="position-relative">
                    <i class="bi bi-bell fs-5 text-secondary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Siswa') }}&background=0D8ABC&color=fff" class="rounded-circle" width="38" height="38" alt="Profile">
                    <div class="text-start leading-tight">
                        <div class="fw-bold small mb-0">{{ Auth::user()->name ?? 'Ayu Wandira' }}</div>
                        <span class="text-muted" style="font-size: 0.75rem;">Siswa</span>
                    </div>
                    <i class="bi bi-chevron-down text-muted small ms-1"></i>
                </div>
            </div>
        </div>

        <!-- DASHBOARD HEADER -->
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="fw-bold mb-1">
                    Selamat pagi, {{ explode(' ', Auth::user()->name ?? 'Ayu')[0] }}! 👋
                </h3>
                <p class="text-muted small mb-0">Semoga harimu menyenangkan dan tetap semangat!</p>
            </div>
            <div class="text-end">
                <div class="fw-bold fs-6">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
                <span class="text-muted small">Kerja keras hari ini, hasil luar biasa nanti ✨</span>
            </div>
        </div>

        <!-- GRID KONTEN 2 KOLOM -->
        <div class="row g-4">
            
            <!-- KOLOM KIRI (UTAMA) -->
            <div class="col-lg-8">
                
                <!-- Waktu & Status Absen Hari Ini -->
                <div class="row g-3 mb-4">
                    <!-- Widget Jam Realtime & Tombol Absen -->
                    <div class="col-md-6">
                        <div class="card card-custom p-4 text-center">
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 mb-2 align-self-center small">● Waktu Sekarang</span>
                            <div class="fw-bold display-6 my-1" id="liveClock">00:00:00</div>
                            <p class="text-muted small mb-3">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>

                            <!-- Alert Notifikasi -->
                            @if(session('success'))
                                <div class="alert alert-success py-2 small mb-3">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger py-2 small mb-3">{{ session('error') }}</div>
                            @endif

                            <!-- Logika Tombol Absen Masuk / Keluar / Selesai -->
                            @if(!isset($todayAttendance) || !$todayAttendance)
                                <form action="{{ route('attendance.checkIn') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-absen d-flex align-items-center justify-content-center gap-2">
                                        <i class="bi bi-fingerprint fs-5"></i> Absen Masuk
                                    </button>
                                </form>
                            @elseif(!$todayAttendance->time_out)
                                <form action="{{ route('attendance.checkOut') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning text-white fw-bold w-100 py-2 rounded-3 d-flex align-items-center justify-content-center gap-2">
                                        <i class="bi bi-box-arrow-right fs-5"></i> Absen Keluar
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary w-100 py-2 rounded-3 text-white fw-bold" disabled>
                                    <i class="bi bi-check-circle-fill me-1"></i> Sudah Absen Hari Ini
                                </button>
                            @endif

                            <span class="text-muted mt-2" style="font-size: 0.75rem;">Jam kerja: 08:00 – 17:00 WIB</span>
                        </div>
                    </div>

                    <!-- Widget Status Hari Ini -->
                    <div class="col-md-6">
                        <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-1 mb-3 small"><i class="bi bi-calendar-event me-1"></i> Status Hari Ini</span>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    @if(!isset($todayAttendance) || !$todayAttendance)
                                        <span class="p-2 bg-danger rounded-circle d-inline-block"></span>
                                        <h5 class="fw-bold mb-0">Belum Absen</h5>
                                    @elseif(strtolower($todayAttendance->status) == 'terlambat')
                                        <span class="p-2 bg-warning rounded-circle d-inline-block"></span>
                                        <h5 class="fw-bold mb-0">Terlambat</h5>
                                    @else
                                        <span class="p-2 bg-success rounded-circle d-inline-block"></span>
                                        <h5 class="fw-bold mb-0">Sudah Absen Masuk</h5>
                                    @endif
                                </div>
                                <p class="text-muted small">
                                    @if(!isset($todayAttendance) || !$todayAttendance)
                                        Ayo lakukan absensi untuk memulai hari ini!
                                    @else
                                        Masuk jam: {{ $todayAttendance->time_in ?? $todayAttendance->time }} WIB
                                    @endif
                                </p>
                            </div>
                            <div class="p-3 bg-light rounded-3 text-muted fst-italic small border-start border-3 border-primary">
                                “Kedisiplinan adalah jembatan antara tujuan dan pencapaian.”
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistik Kehadiran -->
                <div class="card card-custom p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="bi bi-bar-chart-fill text-primary me-2"></i>Statistik Kehadiran</h6>
                        <select class="form-select form-select-sm w-auto border-0 bg-light rounded-pill px-3">
                            <option>{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</option>
                        </select>
                    </div>

                    <div class="row g-3">
                        <!-- Hadir -->
                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-4 bg-stat-hadir">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="stat-icon bg-success text-white"><i class="bi bi-person-check-fill"></i></div>
                                    <span class="fw-semibold small">Hadir</span>
                                </div>
                                <h3 class="fw-bold mb-1">{{ $totalHadir ?? 0 }} <span class="fs-6 fw-normal text-muted">hari</span></h3>
                                <span class="text-success small" style="font-size: 0.7rem;">↗ Statistik terkini</span>
                            </div>
                        </div>
                        <!-- Terlambat -->
                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-4 bg-stat-terlambat">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="stat-icon bg-warning text-white"><i class="bi bi-clock-history"></i></div>
                                    <span class="fw-semibold small">Terlambat</span>
                                </div>
                                <h3 class="fw-bold mb-1">{{ $totalTerlambat ?? 0 }} <span class="fs-6 fw-normal text-muted">hari</span></h3>
                                <span class="text-danger small" style="font-size: 0.7rem;">↘ Statistik terkini</span>
                            </div>
                        </div>
                        <!-- Izin -->
                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-4 bg-stat-izin">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="stat-icon bg-primary text-white"><i class="bi bi-file-earmark-text-fill"></i></div>
                                    <span class="fw-semibold small">Izin</span>
                                </div>
                                <h3 class="fw-bold mb-1">{{ $totalIzin ?? 0 }} <span class="fs-6 fw-normal text-muted">hari</span></h3>
                                <span class="text-muted small" style="font-size: 0.7rem;">Statistik terkini</span>
                            </div>
                        </div>
                        <!-- Tidak Hadir -->
                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-4 bg-stat-alpa">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="stat-icon bg-danger text-white"><i class="bi bi-x-circle-fill"></i></div>
                                    <span class="fw-semibold small">Tidak Hadir</span>
                                </div>
                                <h3 class="fw-bold mb-1">{{ $totalTidakHadir ?? 0 }} <span class="fs-6 fw-normal text-muted">hari</span></h3>
                                <span class="text-success small" style="font-size: 0.7rem;">Statistik terkini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Riwayat Absensi -->
                <div class="card card-custom p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="bi bi-clock-fill text-primary me-2"></i>Riwayat Absensi</h6>
                        <a href="{{ route('attendance.history') }}" class="text-primary text-decoration-none small fw-semibold">Lihat Semua</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0">
                            <thead class="table-light rounded-3">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attendances ?? [] as $item)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($item->date ?? $item->created_at)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->date ?? $item->created_at)->translatedFormat('l') }}</td>
                                        <td>{{ $item->time_in ?? $item->time ?? '-' }}</td>
                                        <td>{{ $item->time_out ?? '-' }}</td>
                                        <td>
                                            @if(strtolower($item->status) == 'hadir')
                                                <span class="badge-status hadir">● Hadir</span>
                                            @elseif(strtolower($item->status) == 'terlambat')
                                                <span class="badge-status terlambat">● Terlambat</span>
                                            @elseif(strtolower($item->status) == 'izin')
                                                <span class="badge-status libur">● Izin</span>
                                            @else
                                                <span class="badge-status belum">● {{ ucfirst($item->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Belum ada riwayat absensi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN (SIDEBAR WIDGET) -->
            <div class="col-lg-4">
                
                <!-- Kalender Absensi Mini Realtime -->
                @php
                    use Carbon\Carbon;
                    $now = Carbon::now();
                    $startOfMonth =$now->copy()->startOfMonth();
                    $startOfWeek =$startOfMonth->dayOfWeek; 
                    $daysInMonth =$now->daysInMonth;
                    $today =$now->day;
                @endphp

                <div class="card card-custom p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="bi bi-calendar-week me-2 text-primary"></i>Kalender Absensi</h6>
                        <a href="#" class="text-primary text-decoration-none small">Lihat Detail</a>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <i class="bi bi-chevron-left text-muted"></i>
                        <span class="fw-bold small">{{ $now->translatedFormat('F Y') }}</span>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </div>

                    <table class="table calendar-table mb-0">
                        <thead>
                            <tr>
                                <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th><th>Kam</th><th>Jum</th><th>Sab</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $currentDay = 1; @endphp
                            @for ($i = 0; $i < 6; $i++)
                                @if ($currentDay >$daysInMonth) @break @endif
                                <tr>
                                    @for ($j = 0; $j < 7; $j++)
                                        @if ($i === 0 && $j <$startOfWeek)
                                            <td></td>
                                        @elseif ($currentDay >$daysInMonth)
                                            <td></td>
                                        @else
                                            <td class="{{ $currentDay ==$today ? 'active-day' : '' }}">
                                                {{ $currentDay }}
                                            </td>
                                            @php $currentDay++; @endphp
                                        @endif
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Pengumuman & Informasi -->
                <div class="card card-custom p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0"><i class="bi bi-megaphone me-2 text-primary"></i>Informasi</h6>
                        <a href="#" class="text-primary text-decoration-none small">Lihat Semua</a>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 bg-light rounded-3 text-primary"><i class="bi bi-calendar-event"></i></div>
                            <div>
                                <h6 class="fw-semibold mb-0 small">Pengumuman Jadwal Libur Nasional</h6>
                                <span class="text-muted" style="font-size: 0.7rem;">10 Sep 2026</span>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 bg-light rounded-3 text-primary"><i class="bi bi-arrow-repeat"></i></div>
                            <div>
                                <h6 class="fw-semibold mb-0 small">Update Sistem Absensi</h6>
                                <span class="text-muted" style="font-size: 0.7rem;">8 Sep 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner Motivasi -->
                <div class="card card-custom p-4 bg-primary bg-opacity-10 border-0">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-leaf text-success fs-3"></i>
                        <p class="mb-0 small text-dark fw-medium">
                            Setiap kehadiran adalah kontribusi nyata untuk kesuksesan bersama.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Script Jam Digital Realtime -->
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('liveClock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>