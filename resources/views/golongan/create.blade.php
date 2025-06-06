@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Golongan Baru</h2>
    <form action="{{ route('golongan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_Gol" class="form-label">Nama Golongan</label>
            <input type="text" class="form-control" id="nama_Gol" name="nama_Gol" required>
            @error('nama_Gol')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Golongan</button>
        <a href="{{ route('golongan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('golonganForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted'); // Cek di console browser
        
        // Submit form secara manual
        this.submit();
    });
</script>
@endpush