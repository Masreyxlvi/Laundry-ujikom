<?php

namespace App\Exports;

use App\Models\Barang;
use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }
    public function map($barang): array
    {
        return [
            $barang->id,
            $barang->nama_barang,
            $barang->qty,
            $barang->harga,
            $barang->waktu_pembelian,
            $barang->status,
            $barang->supplier,
        ];
    }

    public function headings(): array
    {
        return  [
            'No',
            'Nama Barang',
            'qty',
            'harga',
            'Waktu Pembelian',
            'Status',
            'Supplier',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class  =>  function(AfterSheet  $event){
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1,2);
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1', 'DATA BARANG GHS LAUNDRY');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal
                (\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                
                $event->sheet->getStyle('A3:G'. $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

            }
        ];
    }
}
