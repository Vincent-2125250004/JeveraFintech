<?php

namespace App\Exports;

use App\Models\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class MobilExport implements FromCollection, WithStyles, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $data = Mobil::orderBy('id', 'asc')->get()->map(function ($item) {
            $item->Berkas_Pendukung = $item->berkas->count() > 0 ? 'Ada' : 'Tidak Ada';
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
            'Nomor Polisi',
            'Nomor Lambung',
            'Pemilik',
            'Nomor Seri',
            'Nomor Rangka',
            'Nomor Mesin',
            'Tanggal Masuk',
            'Tanggal Keluar',
            'Data Dibuat',
            'Data Diubah',
            'Berkas Pendukung',
        ];
    }
}

