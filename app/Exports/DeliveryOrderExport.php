<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\DeliveryOrder;
use Carbon\Carbon;

class DeliveryOrderExport implements FromCollection, WithStyles, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $data = DeliveryOrder::orderBy('id',         'asc')->get()->map(function ($item) {
            $item->Rute = $item->rute->Asal_Rute . ' - ' . $item->rute->Tujuan_Rute;
            $item->Total_Harga = "Rp. " . number_format($item->Total_Harga, 0, ',', '.');
            $item->Uang_Jalan = "Rp. " . number_format($item->rute->Uang_Jalan, 0, ',', '.');
            $item->created_at = Carbon::parse($item->created_at)->format('Y-m-d\TH:i:s.u\Z');
            $item->updated_at = Carbon::parse($item->updated_at)->format('Y-m-d\TH:i:s.u\Z');
            return $item;
        });
        return $data;

    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:{$lastColumn}{$lastRow}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


        $sheet->getStyle('A1:M1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14, 'name' => 'Calibri'],
            'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '87CEEB']],
        ]);

        $sheet->getStyle('A2:M' . ($sheet->getHighestRow()))->applyFromArray([
            'font' => ['size' => 12, 'name' => 'Calibri'],
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
            'Total_Harga',
            'Data Dibuat',
            'Data Diubah',
            'Uang Jalan',
        ];
    }
}
