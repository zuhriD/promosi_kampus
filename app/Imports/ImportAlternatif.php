<?php

namespace App\Imports;

use App\Models\Alternatif;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAlternatif implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alternatif([
            //
            'id' => $row[0],
            'nama_alternatif' => $row[2],
            'sub_kriteria_id' => $row[1],
            'bobot' => $row[3],
        ]);
    }
}
