<?php

namespace App\Imports;

use App\Models\PenjemputanLaundry;
use App\Models\Member;
use App\Models\Penjemputan;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PenjemputanImport implements WithValidation, ToModel,  WithHeadingRow
{
    public function model(array $row)
    {
        $gender = $row['jenis_kelamin'] === 'Laki-laki' ? 'L' : 'P';
        $memberId = null;
        $member = Member::where('nama', $row['nama_pelanggan'])->where('alamat', $row['alamat_pelanggan'])->where('jenis_kelamin', $gender)->where('telp', $row['nomor_telepon'])->first();
        if ($member) {
            $memberId = $member->id;
        } else {
            $member = Member::create([
                'nama' => $row['nama_pelanggan'],
                'alamat' => $row['alamat_pelanggan'],
                'jenis_kelamin' => $gender,
                'telp' => $row['nomor_telepon'],
            ]);
            $memberId = $member->id;
        }

        $status = '';
        switch ($row['status_penjemputan']) {
            case 'tercatat':
                $status = 'tercatat';
                break;
            case 'penjemputan':
                $status = 'penjemputan';
                break;
            case 'selesai':
                $status = 'selesai';
                break;
        }

        

        return new Penjemputan([
            'member_id' => $memberId,
            'petugas' => $row['nama_petugas_penjemputan'],
            'status' => $status,
        ]);
    }

    public function rules(): array
    {
        return [
            'status' => Rule::in(['tercatat', 'penjemputan', 'selesai']),
        ];
    }
}