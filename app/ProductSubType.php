<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubType extends Model
{
    //
    protected $table = 'product_subtypes';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'type_id', 'name', 'is_deleted'
    ];
}
