<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrigen extends Model
{
    //
    protected $table = 'product_origen';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'name'
    ];
}
