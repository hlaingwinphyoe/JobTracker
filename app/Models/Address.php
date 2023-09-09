<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
