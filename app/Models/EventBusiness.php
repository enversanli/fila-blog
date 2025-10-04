<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBusiness extends Model
{
    protected $connection = 'events';
    protected $table = 'businesses';
    protected $guarded = [];
}
