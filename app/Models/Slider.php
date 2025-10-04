<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'button',
    ];

    // Optionally, you can cast dates
    protected $dates = [
        'start_date',
        'end_date',
    ];
}
