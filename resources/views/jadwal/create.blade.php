@extends('layouts.app')

@section('content')
<h1>{{ isset($jadwal) ? 'Edit' : 'Tambah' }} Jadwal Akademik</h1>

<form method="POST" action="{{ isset($jadwal) ? route('jadwal.update', $jadwal) : route('jadwal.store') }}">
    @csrf
    @if(isset($jadwal)) @method('PUT') @endif

    <div class="mb-3">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control" value="{{ old('hari', $jadwal->hari ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Mata Kuliah</label>
        <select name="Kode_mk" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach ($matakuliahs as $mk)
                <option value="{{ $mk->Kode_mk }}" {{ old('Kode_mk', $jadwal->Kode_mk ?? '') == $mk->Kode_mk ? 'selected' : '' }}>
                    {{ $mk->Nama_mk }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Ruang</label>
        <select name="id_ruang" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach ($ruangs as $ruang)
                <option value="{{ $ruang->id }}" {{ old('id_ruang', $jadwal->id_ruang ?? '') == $ruang->id ? 'selected' : '' }}>
                    {{ $ruang->nama_ruang }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
    <label for="nama_Gol">Golongan</label>
    <select name="id_Gol" id="id_Gol" class="form-control" required>
        <option value="">-- Pilih --</option>
        @foreach ($golongans as $gol)
            <option value="{{ $gol->id }}" {{ old('id_Gol', $jadwal->id_Gol ?? '') == $gol->id ? 'selected' : '' }}>
                {{ $gol->nama_Gol }}
            </option>
        @endforeach
    </select>
    @error('id_Gol')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


    <button class="btn btn-success">{{ isset($jadwal) ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
