@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Ruang</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ruang.create') }}" class="btn btn-primary mb-3">+ Tambah Ruang</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%;">ID</th>
                        <th>Nama Ruang</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ruangs as $ruang)
                        <tr>
                            <td>{{ $ruang->id }}</td>
                            <td>{{ $ruang->nama_ruang }}</td>
                            <td>
                                <a href="{{ route('ruang.edit', $ruang) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('ruang.destroy', $ruang) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus ruang ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada data ruang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
