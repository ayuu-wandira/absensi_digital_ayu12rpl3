<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsensiKu - Panel Verifikasi Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7fe; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .main-content { padding: 30px; }
        .card-custom { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); }
    </style>
</head>
<body>

    <div class="container main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1"><i class="bi bi-shield-lock text-primary me-2"></i>Panel Verifikasi Izin (Guru/Admin)</h3>
                <p class="text-muted small mb-0">Kelola dan verifikasi permohonan izin dari siswa.</p>
            </div>
            <a href="/permission" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i> Ke Halaman Siswa</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom bg-white p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tgl Pengajuan</th>
                            <th>Jenis</th>
                            <th>Rentang Tanggal</th>
                            <th>Alasan</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th class="text-center">Aksi (Verifikasi)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $item)
                            <tr>
                                <td class="small">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td><span class="badge bg-secondary text-capitalize">{{ $item->type }}</span></td>
                                <td class="small fw-semibold">
                                    {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                                    @if($item->start_date != $item->end_date)
                                        - {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}
                                    @endif
                                </td>
                                <td><span class="small">{{ $item->reason }}</span></td>
                                <td>
                                    @if($item->image)
                                        <a href="{{ asset('storage/' . $item->image) }}" target="_blank" class="btn btn-sm btn-light border"><i class="bi bi-file-earmark-image me-1"></i> Lihat</a>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'approved' ? 'success' : ($item->status == 'rejected' ? 'danger' : 'warning') }} {{ $item->status == 'pending' ? 'text-dark' : '' }} text-capitalize">
                                        {{ $item->status == 'pending' ? 'Menunggu' : ($item->status == 'approved' ? 'Disetujui' : 'Ditolak') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- Tombol Setujui -->
                                        <form action="/admin/permission/{{ $item->id }}/status" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-sm btn-success fw-semibold" {{ $item->status == 'approved' ? 'disabled' : '' }}>
                                                <i class="bi bi-check-lg"></i> Setujui
                                            </button>
                                        </form>

                                        <!-- Tombol Tolak -->
                                        <form action="/admin/permission/{{ $item->id }}/status" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-sm btn-outline-danger fw-semibold" {{ $item->status == 'rejected' ? 'disabled' : '' }}>
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Belum ada pengajuan izin dari siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>