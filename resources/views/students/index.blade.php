@extends('layouts.app')

@section('title', 'Data Siswa - AbsensiKu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Data Siswa</h4>
        <p class="text-muted small mb-0">Kelola informasi daftar siswa terdaftar</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary rounded-pill px-3 shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Siswa
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light text-uppercase small text-muted">
                <tr>
                    <th class="py-3 rounded-start">No</th>
                    <th class="py-3">NISN</th>
                    <th class="py-3">Nama Siswa</th>
                    <th class="py-3">Kelas</th>
                    <th class="py-3">JK</th>
                    <th class="py-3">Alamat</th>
                    <th class="py-3 text-center rounded-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $index => $student)
                <tr>
                    <td class="fw-semibold">{{ $students->firstItem() + $index }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $student->nisn }}</span></td>
                    <td class="fw-bold text-dark">{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="text-muted small">{{ Str::limit($student->address, 30) ?? '-' }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-outline-warning rounded-3" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data siswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="mt-3">
        {{ $students->links() }}
    </div>
</div>
@endsection