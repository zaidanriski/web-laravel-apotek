<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_obat', 'jenis_obat', 'kategori', 'harga_obat', 'jumlah_obat'
    ];
}
