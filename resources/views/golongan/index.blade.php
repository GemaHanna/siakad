@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Daftar Golongan</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('golongan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Golongan Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Golongan</th>
                            <th>Keterangan</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($golongans as $key => $golongan)
                        <tr>
                            <td>{{ $golongans->firstItem() + $key }}</td>
                            <td>{{ $golongan->nama_Gol }}</td>
                            <td>{{ $golongan->keterangan ?? '-' }}</td>
                            <td>{{ $golongan->mahasiswas_count ?? 0 }}</td>
                            <td>{{ $golongan->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('golongan.edit', $golongan->id) }}" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('golongan.destroy', $golongan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                title="Hapus" onclick="return confirm('Apakah Anda yakin?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data golongan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $golongans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th {
        white-space: nowrap;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endpush