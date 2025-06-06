@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Mata Kuliah</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('matakuliah.update', $matakuliah->Kode_mk) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Kode_mk" class="form-label">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="Kode_mk" name="Kode_mk" value="{{ $matakuliah->Kode_mk }}" required>
                </div>

                <div class="mb-3">
                    <label for="Nama_mk" class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="Nama_mk" name="Nama_mk" value="{{ $matakuliah->Nama_mk }}" required>
                </div>

                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" value="{{ $matakuliah->sks }}" required>
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" value="{{ $matakuliah->semester }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
