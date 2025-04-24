<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
	protected $table = 'catalogs';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    const UPDATED_AT = null;

    protected $fillable = [
        'id_product_type',
        'id_aliado',
        'is_deleted',
        'file_name',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
    
}
