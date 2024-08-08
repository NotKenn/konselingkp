<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblKasus extends Model
{
    use HasFactory;
    public $table ="tbl_kasus";

    protected $fillable = [
        'NISN',
        'tglKasus',
        'penjelasan',
        'penanganan',
        'kelas',
        'penanganKasus',
        'rencanaTindakLanjut',
        'status',
    ];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Students::class, 'NISN', 'NISN');
    }
}
