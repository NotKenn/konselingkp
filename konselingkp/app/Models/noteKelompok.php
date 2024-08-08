<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noteKelompok extends Model
{
    use HasFactory;
    public $table = "noteKelompok";

    protected $fillable =[
        'user_id',
        'targetKonselingKelompok',
        'tglRencanaPelaksanaan',
        'materi',
        'tglRealisasiPelaksanaan',
        'evaluasiProses',
        'evaluasiAkhir',
        'status',
        'descHambatan',
        'descAltSolusi',
        'descRTL'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
