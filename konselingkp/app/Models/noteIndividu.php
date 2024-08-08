<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noteIndividu extends Model
{
    use HasFactory;

    public $table = "noteindividu";

    protected $fillable = [
        'user_id',
        'students_id',
        'konselingSebelumnya',
        'isNew',
        'jenisKonseling',
        'tglKonseling',
        'deskripsiUmum',
        'deskripsiMasalah',
        'tindakan',
        'catatan',
        'rencanaTindakLanjut',
        'tglRTL',
        'status'
    ];

    public $timestamps = false;

    public function noteI()
    {
        return $this->hasMany(noteIndividu::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Students::class, 'students_id', 'NISN');
    }
}
