<?php

namespace App\Imports;

use App\Models\SubKriteria;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSubKriteria implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubKriteria([
            //
            'id' => $row[0],
            'nama_sub' => $row[2],
            'kriteria_id' => $row[1],
            'bobot' => $row[3],
        ]);
    }
}
