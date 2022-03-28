<?php

namespace App\Imports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PaketImport implements WithValidation, ToModel,  WithHeadingRow
{
    private $outletId;

    public function __construct()
    {
        $this->outletId = Auth::user()->role === 'admin' ? Auth::user()->outlet_id : '';
    }
    
    public function model(array $row)
    {
        $jenis = '';
        switch ($row['jenis_paket']) {
            case 'Kiloan':
                $jenis = 'kiloan';
                break;
            case 'Selimut':
                $jenis = 'selimut';
                break;
            case 'Bed Cover':
                $jenis = 'bed-cover';
                break;
            case 'Kaos':
                $jenis = 'kaos';
                break;
        }

        return new Paket([
            'nama_paket' => $row['nama_paket'],
            'jenis_paket' => $jenis,
            'harga' => $row['harga'],
            'outlet_id' => $this->outletId
        ]);
    }
    public function rules(): array
    {
        return [
            'jenis_paket' => Rule::in(['Kiloan', 'Selimut', 'Bed Cover', 'Kaos']),
        ];
    }
}
