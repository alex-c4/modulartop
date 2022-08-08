<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
	protected $table = 'contacts';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'nameContact', 'lastNameContact', 'emailContact', 'message', 'name_file', 'form', 'whatsapp', 'linkedin', 'instagram', 'facebook', 'pinterest'
    ];
	
	
	
}
