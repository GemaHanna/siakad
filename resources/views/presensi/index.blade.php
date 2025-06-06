@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Presensi Akademik</h2>
    <a href="{{ route('presensi.create') }}" class="btn btn-primary mb-3">Tambah Presensi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Status Kehadiran</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>Dosen Pengampu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->status_kehadiran }}</td>
                <td>{{ $item->NIM }}</td>
                <td>{{ $item->mahasiswa->Nama ?? '-' }}</td>
                <td>{{ $item->Kode_mk }}</td>
                <td>{{ $item->matakuliah->Nama_mk ?? '-' }}</td>
                <td>{{ $item->pengampu->dosen->Nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('presensi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('presensi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
