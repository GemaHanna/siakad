@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Presensi</h2>

    <form action="{{ route('presensi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
            <select name="status_kehadiran" class="form-select" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="NIM" class="form-label">Mahasiswa</label>
            <select name="NIM" class="form-select" required>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->NIM }}">{{ $mhs->Nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Kode_mk" class="form-label">Mata Kuliah</label>
            <select name="Kode_mk" class="form-select" required>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->Kode_mk }}">{{ $mk->Nama_mk }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Dosen Pengampu</label>
            <select name="pengampu_id" class="form-select" required>
                @foreach($pengampus as $pengampu)
                    <option value="{{ $pengampu->id }}">
                        {{ $pengampu->dosen->Nama }} - {{ $pengampu->matakuliah->Nama_mk }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('presensi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
