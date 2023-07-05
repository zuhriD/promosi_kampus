<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanResponden extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_respondens';
    protected $fillable = [
        'id_responden',
        'id_list',
        'type_jawaban',
        'nilai_jawaban'
    ];


    public function respondens()
    {
        return $this->belongsToMany(Responden::class, 'pertanyaan_respondens', 'id', 'id_responden');
    }

    public function listPertanyaan()
    {
        return $this->belongsToMany(ListPertanyaan::class, 'pertanyaan_respondens', 'id', 'id_list');
    }
}
