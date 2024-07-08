<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class ProductMaterialExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return DB::table("product_materials")->get();
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
        return 'Materiales';
    }
}
