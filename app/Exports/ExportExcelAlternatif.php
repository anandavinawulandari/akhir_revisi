<?php

namespace App\Exports;

use App\Models\Alternatif;
use App\Models\Subkriteria;
use App\Models\Pesdik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcelAlternatif implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Alternatif::query()
        ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
        ->select(
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.tahun_ajaran',
                'alternatif.bobot_riwayat',
                'alternatif.bobot_pekerjaan',
                'alternatif.bobot_penghasilan',
                'alternatif.bobot_jml_tanggungan',
                'alternatif.bobot_nilai',
        );
    }
    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Tahun Ajaran',
            'Bobot Penilaian Riwayat',
            'Bobot Penilaian Pekerjaan Orangtua',
            'Bobot Penilaian Penghasilan Perbulan',
            'Bobot Penilaian Jumlah Tanggungan Orangtua',
            'Bobot Penilaian Nilai Rata-rata',
        ];
    }
}
