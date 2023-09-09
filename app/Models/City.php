<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $guarded = [];

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id');
    }
}
