<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;

    protected $table = 'k_r_s';
    protected $fillable = ['NIM', 'Kode_mk'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM');
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'Kode_mk', 'Kode_mk');
    }
}
