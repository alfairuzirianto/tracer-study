<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracer extends Model
{
    protected $table = 'tracer';

    protected $fillable = [
        'nim',
        'status',
        'waktu_tunggu',
        'nama_instansi',
        'kota_instansi',
        'alamat_instansi',
        'jenis_instansi',
        'jabatan',
        'pendapatan',
        'keselarasan'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'nim', 'nim');
    }
}
