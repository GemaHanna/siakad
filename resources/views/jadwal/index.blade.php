@extends('layouts.app')

@section('content')
<h1>Jadwal Akademik</h1>
<a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Hari</th>
            <th>Mata Kuliah</th>
            <th>Ruang</th>
            <th>Golongan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->hari }}</td>
            <td>{{ $jadwal->matakuliah->Nama_mk }}</td>
            <td>{{ $jadwal->ruang->nama_ruang }}</td>
            <td>{{ $jadwal->golongan->nama_Gol ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('jadwal.edit', $jadwal) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus jadwal ini?')" class="btn btn-danger btn-sm" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
