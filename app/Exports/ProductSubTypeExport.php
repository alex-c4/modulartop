<?php

namespace App\Exports;

use App\ProductSubType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductSubTypeExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductSubType::where('is_deleted', false)
            ->select('id', 'name', 'type_id')
            ->orderBy('type_id', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'ID tipo de producto'
        ];
    }

    public function title(): string
    {
        return 'Sub Tipo';
    }
}
