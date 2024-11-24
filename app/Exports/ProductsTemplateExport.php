<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsTemplateExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
        
    // }

    public function array(): array
    {
        return [];
    }

    public function headings(): array
    {
        return [
            'categoria',
            'tipo',
            'subtipo',
            'codigo',
            'nombre',
            'origen',
            'acabado',
            'ancho',
            'largo',
            'espesor',
            'material',
            'tipo sustrato',
            'clasificacion_color',
            'descripcion',
            'precio',
            'cantidad_inicial',
            'img_producto'
        ];
    }
}
