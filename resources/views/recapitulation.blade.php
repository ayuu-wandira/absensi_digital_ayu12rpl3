<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsensiKu - Rekapitulasi</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
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

        .main-wrapper {
            margin-left: var(--sidebar-width);
            padding: 20px 30px;
        }

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

        .card-custom {
            border: none;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 2px 12px rgba(0,0,0,0.02);
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
                <li class="nav-item"><a href="{{ route('attendance.index') }}" class="nav-link"><i class="bi bi-grid-fill"></i> Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('scan.index') }}" class="nav-link"><i class="bi bi-calendar-check"></i> Absensi</a></li>
                <li class="nav-item"><a href="{{ route('attendance.history') }}" class="nav-link"><i class="bi bi-clock-history"></i> Riwayat</a></li>
                <li class="nav-item"><a href="{{ route('schedule.index') }}" class="nav-link"><i class="bi bi-calendar3"></i> Jadwal</a></li>
                <li class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-bar-chart-line"></i> Rekapitulasi</a></li>
                <li class="nav-item"><a href="{{ route('permission.index') }}" class="nav-link"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
                <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link"><i class="bi bi-person"></i> Profil</a></li>
                <li class="nav-item"><a href="{{ route('settings.index') }}" class="nav-link"><i class="bi bi-gear"></i> Pengaturan</a></li>
                <li class="nav-item">
                    <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Siswa
                    </a>
                </li>
            </ul>
        </div>
        <div class="px-2 text-muted small text-center pb-2">v1.0.0</div>
    </div>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        
        <!-- TOPBAR -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="position-relative">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="form-control search-input" placeholder="Cari menu, riwayat, atau informasi...">
            </div>

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
                </div>
            </div>
        </div>

        <!-- HEADER KONTEN -->
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Rekapitulasi Kehadiran</h3>
            <p class="text-muted small mb-0">Ringkasan total kehadiran kamu selama satu bulan.</p>
        </div>

        <!-- KARTU STATISTIK RINGKASAN -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card card-custom p-3 border-start border-success border-4">
                    <span class="text-muted small">Hadir</span>
                    <h3 class="fw-bold text-success mt-1 mb-0">20 <span class="fs-6 fw-normal text-muted">Hari</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-3 border-start border-warning border-4">
                    <span class="text-muted small">Izin / Sakit</span>
                    <h3 class="fw-bold text-warning mt-1 mb-0">2 <span class="fs-6 fw-normal text-muted">Hari</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-3 border-start border-danger border-4">
                    <span class="text-muted small">Alpa / Tanpa Keterangan</span>
                    <h3 class="fw-bold text-danger mt-1 mb-0">0 <span class="fs-6 fw-normal text-muted">Hari</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-3 border-start border-primary border-4">
                    <span class="text-muted small">Total Kehadiran</span>
                    <h3 class="fw-bold text-primary mt-1 mb-0">100%</h3>
                </div>
            </div>
        </div>

        <!-- TABEL REKAP BULANAN -->
        <div class="card card-custom p-4">
            <h5 class="fw-bold mb-3"><i class="bi bi-table text-primary me-2"></i>Detail Rekap Bulanan</h5>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Bulan</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpa</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">September 2026</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1">20 Hari</span></td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">1 Hari</span></td>
                            <td><span class="badge bg-info bg-opacity-10 text-info px-2 py-1">1 Hari</span></td>
                            <td><span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">0 Hari</span></td>
                            <td class="fw-bold text-success">95%</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Agustus 2026</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1">22 Hari</span></td>
                            <td><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">0 Hari</span></td>
                            <td><span class="badge bg-info bg-opacity-10 text-info px-2 py-1">0 Hari</span></td>
                            <td><span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">0 Hari</span></td>
                            <td class="fw-bold text-success">100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>