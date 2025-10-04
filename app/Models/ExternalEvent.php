<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalEvent extends Model
{
    protected $connection = 'events';
    protected $table = 'services';
    protected $guarded = [];
}
