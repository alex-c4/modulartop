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
            "img_product" => $row['img_producto'],
            "img_alt" => $row['img_producto'],
            "created_at" => Carbon::now(),
            "created_by" => auth()->user()->id,
            "updated_at" => Carbon::now()
        ]);
    }

    public function rules(): array{
        return [
            'categoria' => ['required', 'integer'],
            'tipo' => ['required', 'integer'],
            'subtipo' => ['required', 'integer'],
            'codigo' => ['required'],
            'nombre' => ['required'],
            'origen' => ['required', 'integer'],
            'acabado' => ['required', 'integer'],
            'ancho' => ['required', 'numeric'],
            'espesor' => ['required', 'numeric'],
            'largo' => ['required', 'numeric'],
            'material' => ['required', 'integer'],
            'tipo_sustrato' => ['required', 'integer'],
            'clasificacion_color' => ['required', 'integer'],
            'descripcion' => ['required'],
            'precio' => ['required'],
            'img_producto' => ['required']

        ];
    }

    public function customValidationMessages()
    {
        return [
            'required' => 'el campo <b>:attribute</b> es requerido.',
            'integer' => 'el campo <b>:attribute</b> debe ser entero.',
        ];
    }
}
