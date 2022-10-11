<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelbarang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'barang';
    protected $fillable = [
        'kd_brg',
        'nm_brg',
        'kategori',
        'satuan',
        'stok',
        'merk',
        'spesifikasi'
    ];

    protected $hidden = [];
}
