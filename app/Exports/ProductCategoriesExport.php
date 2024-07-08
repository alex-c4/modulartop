<?php

namespace App\Exports;
use App\ProductCategory;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductCategoriesExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductCategory::where('is_deleted', false)
            ->select('id', 'name')
            ->get();
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
        return 'Categorias';
    }
}
