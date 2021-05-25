<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table = 'providers';//Puede ser omitido si se sigue las reglas de laravel con los nombres

    protected $fillable = [
        'id', 
        'name'
    ];
}
