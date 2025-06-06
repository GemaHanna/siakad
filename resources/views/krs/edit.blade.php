@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit KRS</h2>
    
    <form action="{{ route('krs.update', $krs->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="NIM" class="form-label">Mahasiswa</label>
            <select name="NIM" id="NIM" class="form-control" required>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->NIM }}" {{ $krs->NIM == $mhs->NIM ? 'selected' : '' }}>
                        {{ $mhs->NIM }} - {{ $mhs->Nama }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="Kode_mk" class="form-label">Mata Kuliah</label>
            <select name="Kode_mk" id="Kode_mk" class="form-control" required>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->Kode_mk }}" {{ $krs->Kode_mk == $mk->Kode_mk ? 'selected' : '' }}>
                        {{ $mk->Kode_mk }} - {{ $mk->Nama_mk }} ({{ $mk->sks }} SKS)
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection