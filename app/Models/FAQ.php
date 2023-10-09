<?php

namespace App\Models;

use App\Traits\FAQTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    // use HasFactory, FAQTrait;

    protected $table = 'faqs';

    protected $guarded = [];

    public function faq_type()
    {
        return $this->belongsTo(FAQType::class, 'faq_type_id');
    }

    public function scopeIsType($query, $type)
    {
        $query->whereHas('faq_type', function ($query) use ($type) {
            $query->where('slug', $type);
        });
    }
}
