<?php

namespace App\Exports;

use App\Models\Pesdik;
use App\Models\Subkriteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportExcelPesdik implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $hasilData = Pesdik::select('nis', 'nama', 'jk', 'ttl', 'alamat', 'kelas', 'tahun_ajaran', 'no_hp', 'nilai', 'penghasilan', 'pekerjaan', 'jml_tanggungan', 'riwayat')->get();
        $tabelLainData = Subkriteria::select('subkriteria')->get();
        // Menggabungkan data dari kedua tabel
        $mergedData = $hasilData->map(function ($item, $key) use ($tabelLainData) {
            $item['subkriteria'] = $tabelLainData[$key]->kolom3;
            return $item;
        });

        return $mergedData;
    }
    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Alamat',
            'Kelas',
            'Tahun Ajaran',
            'Nomor HP',
            'Nilai',
            'Penghasilan Perbulan',
            'Pekerjaan Orangtua',
            'Jumlah Tanggungan Orangtua',
            'Riwayat Bantuan',
        ];
    }
}
