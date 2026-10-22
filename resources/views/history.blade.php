@extends('layouts.app')

@section('title', 'AbsensiKu - Riwayat Absensi')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Riwayat Presensi</h3>
        <p class="text-muted small mb-0">Daftar rekam jejak kehadiran kamu secara lengkap setiap harinya.</p>
    </div>

    <div class="card card-custom p-4">
        <h5 class="fw-bold mb-4"><i class="bi bi-clock-history text-primary me-2"></i>Daftar Kehadiran</h5>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light text-muted small">
                    <tr>
                        <th class="py-3 rounded-start">No</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal</th>
                        <th>Jam Presensi</th>
                        <th class="rounded-end">Status</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <!-- Jika sudah melakukan simulasi absen hari ini, tampilkan paling atas -->
                    @if(session('is_attended'))
                        <tr>
                            <td class="fw-semibold">1</td>
                            <td>Ayu Wandira</td>
                            <td>23 Sep 2026</td>
                            <td>{{ session('attendance_time') }} WIB</td>
                            <td>
                                @if(session('attendance_status') == 'Hadir')
                                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Hadir</span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">Terlambat</span>
                                @endif
                            </td>
                        </tr>
                        @php $no = 2; @endphp
                    @else
                        @php $no = 1; @endphp
                    @endif

                    <!-- Data Riwayat Sebelumnya -->
                    <tr>
                        <td class="fw-semibold">{{ $no++ }}</td>
                        <td>Ayu Wandira</td>
                        <td>15 Sep 2026</td>
                        <td>07:55:12 WIB</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Hadir</span></td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">{{ $no++ }}</td>
                        <td>Ayu Wandira</td>
                        <td>14 Sep 2026</td>
                        <td>08:10:05 WIB</td>
                        <td><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">Terlambat</span></td>
                    </tr>
                    <tr>
                        <td class="fw-semibold">{{ $no++ }}</td>
                        <td>Ayu Wandira</td>
                        <td>13 Sep 2026</td>
                        <td>07:48:30 WIB</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Hadir</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection