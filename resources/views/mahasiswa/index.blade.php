@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Mahasiswa</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success mb-3">Tambah Mahasiswa</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Semester</th>
                    <th>Nohp</th>
                    <th>Golongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->NIM }}</td>
                        <td>{{ $m->Nama }}</td>
                        <td>{{ $m->Alamat }}</td>
                        <td>{{ $m->Semester }}</td>
                        <td>{{ $m->Nohp }}</td>
                        <td>{{ $m->golongan->nama_Gol ?? '-' }}</td>
                        <td>
                            <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data mahasiswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
