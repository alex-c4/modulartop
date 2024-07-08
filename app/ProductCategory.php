<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
	protected $table = 'product_categories';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    protected $fillable = [
        'name', 'is_deleted'
    ];
}
