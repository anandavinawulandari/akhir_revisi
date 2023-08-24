<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'Hasil';
    protected $primaryKey = 'kode_hasil';
    protected $fillable = ['kode_hasil','nilai_rangking', 'nis', 'kode_alternatif', 'status','kode_kriteria', 'kode_subkriteria'];

    public function kriteria(){
    	return $this->belongsTo(Kriteria::class, 'kode_subkriteria');
    }
    public function alternatif(){
    	return $this->belongsTo(Alternatif::class, 'kode_subkriteria');
    }
    public function pesdik(){
    	return $this->belongsTo(Pesdik::class, 'nis');
    }
    public function hasil(){
        return $this->hasMany(Hasil::class);
    }
}
