<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'Alternatif';
    protected $primaryKey = 'kode_alternatif';
    protected $fillable = ['kode_alternatif', 'nis', 'riwayat_c1', 'pekerjaan_c2','penghasilan_c3', 'jml_tanggungan_c4','nilai_c5',
    'bobot_riwayat', 'bobot_pekerjaan','bobot_penghasilan', 'bobot_jml_tanggungan','bobot_nilai'];

    public function pesdik(){
    	return $this->belongsTo(Pesdik::class, 'nis');
    }
    public function alternatif(){
        return $this->hasMany(Alternatif::class);
    }
}
