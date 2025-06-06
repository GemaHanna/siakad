@extends('layouts.app')

@section('content')
<h1>Tambah Mahasiswa</h1>
<form method="POST" action="{{ route('mahasiswa.store') }}">
    @csrf
    <div class="mb-3">
        <label for="NIM">NIM</label>
        <input type="text" name="NIM" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="Nama">Nama</label>
        <input type="text" name="Nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="Nama">Alamat</label>
        <input type="text" name="Alamat" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="Nama">Nohp</label>
        <input type="number" name="Nohp" class="form-control" 
       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
       minlength="10" maxlength="15" required>
    </div>
    <div class="mb-3">
        <label for="Nama">Semester</label>
        <input type="text" name="Semester" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="id_Gol">Golongan</label>
    <select name="id_Gol" class="form-control" required>
    <option value="">Pilih Golongan</option>
    @foreach($golongans as $golongan)
        <option value="{{ $golongan->id }}">
            {{ $golongan->nama_Gol }} 
            @if($golongan->keterangan)
                ({{ $golongan->keterangan }})
            @endif
        </option>
    @endforeach
    </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

@endsection
