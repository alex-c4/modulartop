<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    //
	protected $table = 'newsletters';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'name', 'title', 'content', 'user_id', 'category_id', 'tags', 'name_img'
    ];
	
	
	
}
