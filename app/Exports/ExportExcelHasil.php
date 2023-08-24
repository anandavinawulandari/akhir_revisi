<?php

namespace App\Exports;

use App\Models\Hasil;
use App\Models\Pesdik;
use App\Models\Alternatif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcelHasil implements  FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Hasil::query()
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran',
                'hasil.bobotc1',
                'hasil.bobotc2',
                'hasil.bobotc3',
                'hasil.bobotc4',
                'hasil.bobotc5',
                'hasil.nilai_rangking',
                'hasil.status',
        );
    }
    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Alamat',
            'Kelas',
            'Jenis Kelamin',
            'Tahun Ajaran',
            'Bobot Preferensi Riwayat',
            'Bobot Preferensi Pekerjaan Orang Tua',
            'Bobot Preferensi Penghasilan Orang Tua',
            'Bobot Preferensi Jumlah Tanggungan Orang Tua',
            'Bobot Preferensi Nilai',
            'Nilai Rangking',
            'Status',
        ];
    }
}
