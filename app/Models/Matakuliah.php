<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $primaryKey = 'Kode_mk'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = ['Kode_mk', 'Nama_mk', 'sks', 'semester'];
    public function pengampus()
{
    return $this->hasMany(Pengampu::class, 'Kode_mk', 'Kode_mk');
}
}
