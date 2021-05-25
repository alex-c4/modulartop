<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    
	protected $table = 'inventory';//Puede ser omitido si se sigue las reglas de laravel con los nombres
    
    protected $fillable = [
        'id_product', 
        'quantity'
    ];
}
