<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable = ['kode', 'nama', 'stok', 'kondisi', 'lokasi'];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}