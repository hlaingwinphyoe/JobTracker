<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AppliedJob extends Model
{
    use HasFactory;

    protected $table = 'applied_jobs';

    protected $guarded = [];

    public function job_post(): BelongsTo
    {
        return $this->belongsTo(JobPost::class, 'job_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    // scope function
    public function scopeFilterOn($query)
    {
        if (request('search')) {
            $query->whereHas('job_post', function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            });
        }
    }
}
