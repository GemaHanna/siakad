<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama_Gol']; // Sesuaikan dengan nama kolom di database
    
    // Tambahkan relasi hasMany ke Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_Gol');
    }
}
