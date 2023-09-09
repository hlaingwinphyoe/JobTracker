<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $guarded = [];

    public function townships()
    {
        return $this->hasMany(Township::class, 'region_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
