<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = 'product_types';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'category_id', 'name', 'is_deleted'
    ];
}
