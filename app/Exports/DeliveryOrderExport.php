<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\DeliveryOrder;


class DeliveryOrderExport implements FromCollection, WithStyles, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $data = DeliveryOrder::orderBy('id', 'asc')->get()->map(function ($item) {
            $item->Rute = $item->rute->Asal_Rute . ' - ' . $item->rute->Tujuan_Rute;
            $item->created_at = $item->created_at->setTimezone('Asia/Jakarta');
            $item->updated_at = $item->updated_at->setTimezone('Asia/Jakarta');
            return $item;
        });
        return $data;

    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:{$lastColumn}{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


        $sheet->getStyle('A1:L1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Cambria'],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '87CEEB']],
        ]);

        $sheet->getStyle('A2:L' . ($sheet->getHighestRow()))->applyFromArray([
            'font' => ['size' => 12, 'name' => 'Cambria'],
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nomor DO',
            'Tanggal DO',
            'Nomor Polisi',
            'Nomor Lambung',
            'SJB Muat',
            'SJB Bongkar',
            'Rute',
            'Tonase',
            'Status',
            'Data Dibuat',
            'Data Diubah',
        ];
    }
}
