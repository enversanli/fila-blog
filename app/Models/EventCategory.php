<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $connection = 'events';
    protected $table = 'categories';
    protected $guarded = [];
}
