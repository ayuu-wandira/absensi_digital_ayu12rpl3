@extends('layouts.app')

@section('title', 'Edit Siswa - AbsensiKu')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold mb-1">Edit Data Siswa</h4>
    <p class="text-muted small mb-0">Perbarui informasi data siswa</p>
</div>

<div class="card card-custom p-4" style="max-width: 700px;">
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
    <label class="form-label fw-semibold small">NISN</label>
    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn', $student->nisn) }}" required>
    @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

        <div class="mb-3">
            <label class="form-label fw-semibold small">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold small">Kelas</label>
                <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" value="{{ old('class', $student->class) }}" required>
                @error('class')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold small">Jenis Kelamin</label>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                    <option value="L" {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold small">Alamat</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $student->address) }}</textarea>
            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('students.index') }}" class="btn btn-light rounded-pill px-4">Kembali</a>
            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Perbarui Data</button>
        </div>
    </form>
</div>
@endsection