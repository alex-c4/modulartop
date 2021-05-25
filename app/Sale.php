<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    const UPDATED_AT = null;

    protected $table = 'sales';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'sale_date', 
        'id_client',
        'id_invoice_sale',
        'id_order_sale',
        'observations',
        'invoce_filepdf',
        'created_by',
        'created_at'
    ];
}
