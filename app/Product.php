<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    protected $fillable = [
        'code', 
        'name', 
        'id_product_category',
        'id_product_type',
        'id_product_type',
        'id_subcategory_acabado',
        'id_subcategory_efecto_v',
        'id_subcategory_material',
        'id_subcategory_origen',
        'id_subcategory_sustrato',
        'id_subcategory_color',
        'description',
        'price',
        'img_product',
        'pdf_file',
        'created_at',
        'created_by',
        'updated_at'
    ];
    
}
