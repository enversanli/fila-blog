<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalCities extends Model
{
    protected $connection = 'events';
    protected $table = 'cities';
    protected $guarded = [];
}
