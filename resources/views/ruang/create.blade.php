@extends('layouts.app')

@section('content')
<h1>Tambah Ruang</h1>
<form method="POST" action="{{ route('ruang.store') }}">
    @csrf
    <div class="mb-3">
        <label for="nama_ruang">Nama Ruang</label>
        <input type="text" name="nama_ruang" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
