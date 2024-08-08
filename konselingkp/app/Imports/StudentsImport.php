<?php

namespace App\Imports;

use App\Models\Students;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $students = new Students([
        'NISN'                  => $row['nisn'],
        'Nama'                  => $row['nama'],
        'tempatLahir'           => $row['tempat_lahir'],
        'tglLahir'              => is_numeric($row['tanggal_lahir']) ? Date::excelToDateTimeObject($row['tanggal_lahir']) : null,
        'noHP'                  => $row['nomor_hp'],
        'Alamat'                => $row['alamat'],
        'statusKeaktifanSiswa'  => $row['status_keaktifan_siswa'],
        'namaAyah'              => $row['nama_ayah'],
        'noHPAyah'              => $row['nomor_hp_ayah'],
        'pekerjaanAyah'         => $row['pekerjaan_ayah'],
        'alamatAyah'            => $row['alamat_ayah'],
        'isAyahAlive'           => $row['status_ayah'],
        'namaIbu'               => $row['nama_ibu'],
        'noHPIbu'               => $row['nomor_hp_ibu'],
        'pekerjaanIbu'          => $row['pekerjaan_ibu'],
        'alamatIbu'             => $row['alamat_ibu'],
        'isIbuAlive'            => $row['status_ibu'],
        'statusMaritalOrtu'     => $row['status_marital_orang_tua'],
        'isTinggalBersamaOrtu'  => $row['tinggal_bersama_orang_tua'],
        'namaWali'              => $row['nama_wali'],
        'noHPWali'              => $row['nomor_hp_wali'],
        'pekerjaanWali'         => $row['pekerjaan_wali'],
        'alamatWali'            => $row['alamat_wali'],
        ]);

        return $students;
    }
}
