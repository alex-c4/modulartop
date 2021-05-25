<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSale extends Model
{
    const UPDATED_AT = null;

    protected $table = 'order_sales';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    protected $fillable = [
        'id_user',
        'file_name',
        'created_at',
    ];
}
