<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $fillable = [
        'nama_kategori',
        'image',
    ];

    public function merk()
    {
        return $this->hasMany(Merk::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
