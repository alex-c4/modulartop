<?php

namespace App\Exports;

use App\ProductOrigen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductOrigenExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductOrigen::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
        ];
    }

    public function title(): string
    {
        return 'Origen';
    }
}
