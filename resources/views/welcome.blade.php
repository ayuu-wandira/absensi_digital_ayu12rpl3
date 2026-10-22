<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsensiKu - Sistem Absensi Digital Modern</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
        }
        .hero-section {
            padding: 80px 0 60px;
        }
        .card-feature {
            border: none;
            border-radius: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
        }
        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary" href="/">
                <i class="bi bi-shield-check fs-3"></i>
                <span>AbsensiKu</span>
            </a>
            <div class="d-flex gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/attendance') }}" class="btn btn-primary rounded-pill px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-3">
                        Sistem Presensi Digital Sekolah
                    </span>
                    <h1 class="display-5 fw-bold mb-3 text-dark">
                        Pencatatan Kehadiran Lebih Cepat, Tepat, dan Praktis
                    </h1>
                    <p class="lead text-muted mb-4">
                        Kelola absensi harian, jadwal pelajaran, hingga pengajuan izin dalam satu platform terintegrasi.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/scan" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                            <i class="bi bi-qr-code-scan me-2"></i>Scan Absen Now
                        </a>
                        <a href="/schedule" class="btn btn-light btn-lg rounded-pill px-4 border">
                            <i class="bi bi-calendar3 me-2"></i>Lihat Jadwal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-feature p-4 bg-white shadow-sm h-100">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-qr-code-scan"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Presensi QR Code</h5>
                        <p class="text-muted small mb-0">
                            Proses pencatatan kehadiran instan menggunakan pemindaian QR Code lokasi/kelas.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature p-4 bg-white shadow-sm h-100">
                        <div class="icon-box bg-success bg-opacity-10 text-success">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Rekapitulasi Otomatis</h5>
                        <p class="text-muted small mb-0">
                            Laporan rekap statistik kehadiran harian, mingguan, hingga bulanan secara akurat.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature p-4 bg-white shadow-sm h-100">
                        <div class="icon-box bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Pengajuan Izin Online</h5>
                        <p class="text-muted small mb-0">
                            Kemudahan pengajuan surat izin sakit atau keperluan lain langsung dari sistem.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center text-muted border-top bg-white">
        <div class="container">
            <small>&copy; {{ date('Y') }} AbsensiKu. Seluruh Hak Cipta Dilindungi.</small>
        </div>
    </footer>

</body>
</html>