<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblPrestasi extends Model
{
    use HasFactory;
    public $table = "tbl_prestasi";

    protected $fillable = [
        'NISN',
        'tglPrestasi',
        'namaPrestasi',
        'tingkatPrestasi',
        'kelas',
        'peringkatPrestasi'
    ];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Students::class, 'NISN', 'NISN');
    }
}
