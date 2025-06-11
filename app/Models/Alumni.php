<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'nim',
        'nama',
        'mengisi_tracer',
        'jenis_kelamin',
        'tanggal_lahir',
        'email',
        'telepon',
        'alamat',
        'program_studi',
        'tahun_masuk',
        'tahun_lulus',
        'ipk',
        'nomor_ijazah',
        'foto_ijazah'
    ];

    public function tracer()
    {
        return $this->hasOne(Tracer::class, 'nim', 'nim');
    }
}