<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    const UPDATED_AT = null;

    protected $table = 'purchases';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    protected $fillable = [
        'purchase_date', 
        'id_provider', 
        'id_invoice',
        'observations',
        'created_by',
        'created_at'
    ];
}
