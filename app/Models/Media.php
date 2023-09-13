<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $guarded = [];

    protected $hidden = ['pivot'];
    
    public function employees()
    {
        return $this->morphedByMany(Employee::class, 'mediabble');
    }

    public function scopeIsType($query, $type)
    {
        $query->where('type', $type);
    }
}
