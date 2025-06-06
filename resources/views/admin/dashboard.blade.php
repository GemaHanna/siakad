@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">
        <!-- Statistik Mahasiswa -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Mahasiswa</h6>
                            <h2 class="mb-0">{{ $totalMahasiswa }}</h2>
                        </div>
                        <i class="fas fa-users fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Dosen -->
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Dosen</h6>
                            <h2 class="mb-0">{{ $totalDosen }}</h2>
                        </div>
                        <i class="fas fa-chalkboard-teacher fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Matakuliah -->
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Matakuliah</h6>
                            <h2 class="mb-0">{{ $totalMatakuliah }}</h2>
                        </div>
                        <i class="fas fa-book fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik KRS -->
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total KRS</h6>
                            <h2 class="mb-0">{{ $totalKRS }}</h2>
                        </div>
                        <i class="fas fa-clipboard-list fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection