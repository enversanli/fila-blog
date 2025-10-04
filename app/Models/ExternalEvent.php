<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalEvent extends Model
{
    protected $connection = 'events';
    protected $table = 'services';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id', 'id');
    }

    public function business()
    {
        return $this->belongsTo(EventBusiness::class, 'business_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(EventType::class, 'type_id', 'id');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function scopeSponsored($query)
    {
        return $query->where('sponsored', 1);
    }
}
