<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsensiKu - Profil Saya</title>
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
                <li class="nav-item"><a href="{{ route('recapitulation.index') }}" class="nav-link"><i class="bi bi-bar-chart-line"></i> Rekapitulasi</a></li>
                <li class="nav-item"><a href="{{ route('permission.index') }}" class="nav-link"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
                <li class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-person"></i> Profil</a></li>
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
            <h3 class="fw-bold mb-1">Profil Saya</h3>
            <p class="text-muted small mb-0">Informasi data diri akun siswa.</p>
        </div>

        <!-- KONTEN PROFIL -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom p-4 text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Siswa') }}&background=0D8ABC&color=fff&size=128" class="rounded-circle mx-auto mb-3" width="100" height="100" alt="Avatar">
                    <h5 class="fw-bold mb-1">{{ Auth::user()->name ?? 'Ayu Wandira' }}</h5>
                    <p class="text-muted small mb-3">XII RPL 3</p>
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">Siswa Aktif</span>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-custom p-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-person-badge text-primary me-2"></i>Detail Informasi Siswa</h5>
                    <hr class="text-muted opacity-25">
                    
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted small">Nama Lengkap</div>
                        <div class="col-md-8 fw-semibold">{{ Auth::user()->name ?? 'Ayu Wandira' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted small">Email</div>
                        <div class="col-md-8 fw-semibold">{{ Auth::user()->email ?? 'ayu@example.com' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted small">Kelas / Jurusan</div>
                        <div class="col-md-8 fw-semibold">XII Rekayasa Perangkat Lunak 3</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted small">NIS / NISN</div>
                        <div class="col-md-8 fw-semibold">1234567890</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted small">Status Akun</div>
                        <div class="col-md-8 text-success fw-semibold">Terverifikasi</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>