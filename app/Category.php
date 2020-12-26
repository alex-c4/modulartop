<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
	protected $table = 'categories';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'name', 'isDeleted', 'created_at', 'updated_at', 'updated_by'
    ];
	
}
