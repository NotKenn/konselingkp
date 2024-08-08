<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable =[
        'NISN',
        'Nama',
        'tempatLahir',
        'tglLahir',
        'noHP',
        'Alamat',
        'statusKeaktifanSiswa',
        'namaAyah',
        'noHPAyah',
        'pekerjaanAyah',
        'alamatAyah',
        'isAyahAlive',
        'namaIbu',
        'noHPIbu',
        'pekerjaanIbu',
        'alamatIbu',
        'isIbuAlive',
        'statusMaritalOrtu',
        'isTinggalBersamaOrtu',
        'namaWali',
        'noHPWali',
        'pekerjaanWali',
        'alamatWali',
    ];
    public $timestamps = false;
    protected $dates = ['tglLahir'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

