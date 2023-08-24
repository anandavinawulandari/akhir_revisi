<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'Kriteria';
    protected $primaryKey = 'kode_kriteria';
    protected $fillable = ['kode_kriteria',  'kriteria', 'bobot_kriteria', 'jenis_atribut'];



    public function kriteria(){
        return $this->hasMany(Kriteria::class);
    }
}
