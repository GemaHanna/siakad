<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['NIM', 'Nama', 'Alamat', 'Nohp', 'Semester', 'id_Gol'];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol');
    }
    public function rules()
{
    return [
        'Nohp' => 'required|numeric|digits_between:10,15'
    ];
}
}
