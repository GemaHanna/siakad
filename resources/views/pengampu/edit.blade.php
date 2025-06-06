@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Pengampu</h3>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pengampu.update', $pengampu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Kode_mk" class="form-label">Mata Kuliah</label>
                    <select class="form-select" name="Kode_mk" required>
                        @foreach ($matakuliahs as $mk)
                            <option value="{{ $mk->Kode_mk }}" {{ $pengampu->Kode_mk == $mk->Kode_mk ? 'selected' : '' }}>
                                {{ $mk->Nama_mk }} ({{ $mk->Kode_mk }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="NIP" class="form-label">Dosen Pengampu</label>
                    <select class="form-select" name="NIP" required>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->NIP }}" {{ $pengampu->NIP == $dosen->NIP ? 'selected' : '' }}>
                                {{ $dosen->Nama }} ({{ $dosen->NIP }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengampu.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
