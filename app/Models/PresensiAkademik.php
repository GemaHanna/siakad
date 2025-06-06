<?php

// app/Models/PresensiAkademik.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'tanggal',
        'status_kehadiran',
        'NIM',
        'Kode_mk',
        'Dosen_',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM', (with('pengampu.dosen')));
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk', (with('pengampu.dosen')));
    }

    public function pengampu()
    {
        return $this->belongsTo(Pengampu::class, 'Kode_mk', 'Kode_mk');
    }

    public function dosen()
    {
        return $this->hasOneThrough(Dosen::class, Pengampu::class, 'Kode_mk', 'NIP', 'Kode_mk', 'NIP');
    }
}

