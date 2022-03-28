<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\PenjemputanLaundry;
use App\Models\Member;
use App\Models\Penjemputan;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BarangImport implements WithValidation, ToModel,  WithHeadingRow
{      
    public function model(array $row)
    {
        $status = '';
        switch ($row['status']) {
            case 'diajukan':
                $status = 'diajukan_beli';
                break;
            case 'habis':
                $status = 'habis';
                break;
            case 'Tersedia':
                $status = 'tersedia';
                break;
        }

        return new Barang([
            'nama_barang' => $row['nama_barang'],
            'qty' => $row['qty'],
            'harga' => $row['harga'],
            'waktu_pembelian' => $row['waktu_pembelian'],
            'status' => $status,
            'supplier' => $row['supplier']
        ]);
    }

    public function rules(): array
    {
        return [
            'status' => Rule::in(['diajukan', 'habis', 'Tersedia']),
        ];
    }
}