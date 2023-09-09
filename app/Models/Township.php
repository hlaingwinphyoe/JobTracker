<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    protected $table = 'townships';

    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'township_id', 'id');
    }
}
