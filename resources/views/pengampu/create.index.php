@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Pengampu</h3>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pengampu.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Kode_mk" class="form-label">Mata Kuliah</label>
                    <select class="form-select" name="Kode_mk" required>
                        <option value="" disabled selected>Pilih Mata Kuliah</option>
                        @foreach ($matakuliahs as $mk)
                            <option value="{{ $mk->Kode_mk }}">{{ $mk->Nama_mk }} ({{ $mk->Kode_mk }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="NIP" class="form-label">Dosen Pengampu</label>
                    <select class="form-select" name="NIP" required>
                        <option value="" disabled selected>Pilih Dosen</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->NIP }}">{{ $dosen->Nama }} ({{ $dosen->NIP }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengampu.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
