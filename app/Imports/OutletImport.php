<?php

namespace App\Imports;

use App\Models\outlet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class OutletImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new outlet([
            'nama' => $row[1],
            'alamat' => $row[2],
            'telp' => $row[3]
        ]);
    }
}
