<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;

use App\Category;

class ProductsTemplateExport implements FromCollection, WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $sheets;

    // public function __construct(array $sheets)
    // {
    //     $this->sheets = $sheets;
    // }

    public function collection(){}

    public function array(): array
    {
        return $this->sheets;
    }
    
    public function sheets(): array
    {
        $sheets = [
            new ProductCategoriesExport(),
            new ProductTypeExport(),
            new ProductSubTypeExport(),
            new ProductOrigenExport(),
            new ProductAcabadoExport(),
            new ProductMaterialExport(),
            new ProductSustratoExport(),
            new ProductColorsExport()
        ];

        return $sheets;
    }

    
}
