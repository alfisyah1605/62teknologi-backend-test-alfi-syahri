<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'alias',
        'name',
        'image_url',
        'is_closed',
        'price',
        'rating',
        'location_address1',
        'location_address2',
        'location_address3',
        'location_city',
        'location_zip_code',
        'location_country',
        'location_state',
        'phone',
        'location_latitude',
        'location_longitude'
    ];
}
