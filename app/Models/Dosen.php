<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';
    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        
        'Nama',
        'Alamat',
        'NIP',
        'Nohp'
        
    ];
    public function rules()
{
    return [
        'Nohp' => 'required|numeric|digits_between:10,15',
        'NIP' => 'required|max:30|unique:dosens,NIP',
    ];
}
public function pengampus()
{
    return $this->hasMany(Pengampu::class, 'NIP', 'NIP');
}
}
