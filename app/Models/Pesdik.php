<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesdik extends Model
{
    use HasFactory;
    
    protected $table = 'Pesdik';
    protected $primaryKey = 'nis';
    protected $fillable = ['nis','nama', 'jk', 'alamat', 'ttl', 'kelas', 'nilai', 'file','pekerjaan', 'jml_tanggungan', 'riwayat', 'penghasilan','no_hp','tahun_ajaran'];


    // public function pesdik(){
    //     return $this->belongsTo(Pesdik::class, 'nis');
    // }
    public function pesdik(){
        return $this->hasMany(Pesdik::class, 'nis');
     }
     public function subkriteria(){
    	return $this->belongsTo(Subkriteria::class, 'nisp');
    }
}
