@extends('layouts.app')

@section('content')
<h1>Edit Ruang</h1>
<form method="POST" action="{{ route('ruang.update', $ruang) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label for="nama_ruang">Nama Ruang</label>
        <input type="text" name="nama_ruang" class="form-control" value="{{ $ruang->nama_ruang }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
