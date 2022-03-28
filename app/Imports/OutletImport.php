<?php

namespace App\Imports;

use App\Models\Inventory;
use App\Models\outlet;
use App\Models\Service;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OutletImport implements ToModel,  WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Service|null
     */
    public function model(array $row)
    {
        return new outlet([
            'nama' => $row['nama_outlet'],
            'alamat' => $row['alamat'],
            'telp' => $row['telepon'],
        ]);
    }
}