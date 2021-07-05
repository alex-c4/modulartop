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
        'id_product_subtype',
        'id_product_origen',
        'cantinit',
        'id_product_acabado',
        'id_product_subacabado',
        'width',
        'thickness',
        'length',
        'id_product_material',
        'id_product_sustrato',
        'id_product_color',
        'description',
        'img_product',
        'img_alt',
        'is_deleted',
        'created_at',
        'created_by',
        'updated_at'
    ];
    
}
