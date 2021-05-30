<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'proyectista_id',
        'description',
        'cover_photo',
        'cover_photo_alt_text',
        'plane_photo',
        'ubication',
        'client_name',
        'project_date',
        'partner_company',
        'provider_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
}
