<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kendaraan',
        'nama_kendaraan',
        'deskripsi',
        'kapasitas',
        'satuan_kapasitas',
        'harga_sewa',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'harga_sewa' => 'integer',
    ];

    // Accessor untuk format harga
    public function getHargaSewaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga_sewa, 0, ',', '.');
    }

    // Accessor untuk status string
    public function getStatusTextAttribute()
    {
        return $this->status ? 'Tersedia' : 'Tidak Tersedia';
    }

    // Relation dengan pemesanan
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}