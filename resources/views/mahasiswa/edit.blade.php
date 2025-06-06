@extends('layouts.app')

@section('content')
<h1>Edit Mahasiswa</h1>
<form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
    @csrf @method('PUT')
    
    <div class="mb-3">
        <label for="NIM" class="form-label">NIM</label>
        <input type="text" class="form-control" id="NIM" name="NIM" value="{{ $mahasiswa->NIM }}" required>
    </div>
    
    <div class="mb-3">
        <label for="Nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="Nama" name="Nama" value="{{ $mahasiswa->Nama }}" required>
    </div>
    
    <div class="mb-3">
        <label for="Alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="Alamat" name="Alamat" value="{{ $mahasiswa->Alamat }}" required>
    </div>
    
    <div class="mb-3">
        <label for="Nohp" class="form-label">No HP</label>
        <input type="text" class="form-control" id="Nohp" name="Nohp" value="{{ $mahasiswa->Nohp }}" required>
    </div>
    
    <div class="mb-3">
        <label for="Semester" class="form-label">Semester</label>
        <input type="text" class="form-control" id="Semester" name="Semester" value="{{ $mahasiswa->Semester }}" required>
    </div>
    
    <div class="mb-3">
        <label for="id_Gol" class="form-label">Golongan</label>
        <input type="text" class="form-control" id="id_Gol" name="id_Gol" value="{{ $mahasiswa->id_Gol }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
