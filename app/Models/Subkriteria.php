<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;
    protected $table = 'Subkriteria';
    protected $primaryKey = 'kode_subkriteria';
    protected $fillable = ['kode_subkriteria', 'kode_kriteria', 'subkriteria', 'bobot_nilai','batasan'];

    public function subkriteria(){
    	return $this->belongsTo(Kriteria::class, 'kode_subkriteria');
    }
}
