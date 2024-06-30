<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;


class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            "id_product_category" => $row['categoria'],
            "id_product_type" => $row['tipo'],
            "id_product_subtype" => $row['subtipo'],
            "code" => $row['codigo'],
            "name" => $row['nombre'],
            "id_product_origen" => $row['origen'],
            "id_product_acabado" => $row['acabado'],
            "width" => $row['ancho'],
            "thickness" => $row['espesor'],
            "length" => $row['largo'],
            "id_product_material" => $row['material'],
            "id_product_sustrato" => $row['tipo_sustrato'],
            "id_product_color" => $row['clasificacion_color'],
            "description" => $row['descripcion'],
            "price" => $row['precio'],
            "created_at" => Carbon::now(),
            "created_by" => auth()->user()->id,
            "updated_at" => Carbon::now()
        ]);
    }

    public function rules(): array{
        return [
            '*.categoria' => 'required|integer'
        ];
    }

    // public function customValidationMessages()
    // {
    //     return [
    //         'required' => 'El campo :attribute es requerido.',
    //         'integer' => 'El campo :attribute debe ser entero.',
    //     ];
    // }
}
