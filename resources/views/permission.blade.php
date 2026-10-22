@extends('layouts.app')

@section('title', 'AbsensiKu - Pengajuan Izin & Sakit')

@section('content')
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Pengajuan Izin & Sakit</h3>
        <p class="text-muted small mb-0">Ajukan permohonan izin atau sakit secara online dengan melampirkan bukti yang valid.</p>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Form Pengajuan -->
        <div class="col-lg-7">
            <div class="card card-custom p-4">
                <h5 class="fw-bold mb-4"><i class="bi bi-pencil-square text-primary me-2"></i>Buat Form Pengajuan</h5>

                <!-- Tambahkan id="formPengajuan" pada tag form -->
                <form id="formPengajuan" onsubmit="handlePengajuan(event)">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Jenis Pengajuan</label>
                        <select class="form-select" required>
                            <option value="" selected disabled>Pilih Jenis Pengajuan</option>
                            <option value="Sakit">Sakit (Demam/Lainnya)</option>
                            <option value="Izin">Izin Keperluan Keluarga/Lainnya</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Tanggal Mulai</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Tanggal Selesai</label>
                            <input type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Alasan / Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Tuliskan alasan pengajuan..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-semibold">Lampiran (Surat Dokter / Bukti)</label>
                        <input type="file" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-4 shadow-sm fw-semibold">
                        <i class="bi bi-send me-2"></i> Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Riwayat Status Pengajuan -->
        <div class="col-lg-5">
            <div class="card card-custom p-4 h-100">
                <h5 class="fw-bold mb-4"><i class="bi bi-hourglass-split text-primary me-2"></i>Riwayat Status Pengajuan</h5>

                <div class="d-flex flex-column gap-3">
                    <div class="p-3 bg-light rounded-3 border-start border-warning border-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 small">Menunggu Persetujuan</span>
                            <span class="text-muted" style="font-size: 0.75rem;">22 Sep 2026</span>
                        </div>
                        <div class="fw-bold text-dark">Sakit Demam</div>
                        <div class="text-muted small">22 Sep 2026 - 23 Sep 2026 (2 Hari)</div>
                    </div>

                    <div class="p-3 bg-light rounded-3 border-start border-success border-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 small">Disetujui</span>
                            <span class="text-muted" style="font-size: 0.75rem;">10 Sep 2026</span>
                        </div>
                        <div class="fw-bold text-dark">Izin Acara Keluarga</div>
                        <div class="text-muted small">10 Sep 2026 - 10 Sep 2026 (1 Hari)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script JavaScript untuk memunculkan pop-up berhasil -->
    <script>
        function handlePengajuan(event) {
            event.preventDefault(); // Mencegah reload halaman standar
            
            // Menggunakan SweetAlert jika sudah terpasang, atau menggunakan alert bawaan browser yang stylish
            // Kamu bisa menggantinya dengan library modal Bootstrap jika ingin tampilan popup kustom.
            alert("Berhasil! Pengajuan izin/sakit kamu berhasil terkirim.");
            
            // Reset form setelah dikirim
            document.getElementById('formPengajuan').reset();
            
            // Atau bisa diarahkan ulang jika diperlukan
            // window.location.reload();
        }
    </script>
@endsection