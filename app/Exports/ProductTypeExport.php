<?php

namespace App\Exports;

use App\ProductType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductTypeExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductType::where('is_deleted', false)
            ->select('id', 'category_id', 'name')
            ->orderBy('category_id', 'asc')
            ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'ID de categoria',
            'Nombre',
        ];
    }

    public function title(): string
    {
        return 'Tipos';
    }
}
