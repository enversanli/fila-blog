<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $connection = 'events';
    protected $table = 'types';
    protected $guarded = [];
}
