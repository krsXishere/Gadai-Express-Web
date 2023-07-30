<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'tipe_barang',
        'harga_barang',
        'spesifikasi',
        'image',
        'merk_id',
        'kategori_id',
    ];

    public function merk()
    {
        return $this->hasOne(Merk::class);
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class);
    }
}
