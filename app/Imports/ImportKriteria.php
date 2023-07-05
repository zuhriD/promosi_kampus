<?php

namespace App\Imports;

use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportKriteria implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kriteria([
            //
            'id' => $row[0],
            'nama_kriteria' => $row[1],
            'bobot' => $row[2],
        ]);
    }
}
