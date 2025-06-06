@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Tambah Mata Kuliah Baru</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('matakuliah.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="Kode_mk" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control @error('Kode_mk') is-invalid @enderror" 
                                   id="Kode_mk" name="Kode_mk" value="{{ old('Kode_mk') }}" required>
                            @error('Kode_mk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Nama_mk" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control @error('Nama_mk') is-invalid @enderror" 
                                   id="Nama_mk" name="Nama_mk" value="{{ old('Nama_mk') }}" required>
                            @error('Nama_mk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror" 
                                   id="sks" name="sks" value="{{ old('sks') }}" min="1" max="10" required>
                            @error('sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" class="form-control @error('semester') is-invalid @enderror" 
                                   id="semester" name="semester" value="{{ old('semester') }}" min="1" max="8" required>
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         <!-- Form Pengampu (Dosen Pengajar) -->
                         <div class="mb-3">
                            <label class="form-label">Dosen Pengampu</label>
                            <div id="pengampu-container">
                                <!-- Input pengampu pertama -->
                                <div class="input-group mb-2">
                                    <select name="pengampu[]" class="form-select @error('pengampu') is-invalid @enderror" required>
                                        <option value="">Pilih Dosen</option>
                                        @foreach($dosens as $dosen)
                                            <option value="{{ $dosen->NIP }}">{{ $dosen->Nama }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-success" onclick="tambahPengampu()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            @error('pengampu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection