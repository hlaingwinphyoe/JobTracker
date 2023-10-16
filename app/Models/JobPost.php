<?php

namespace App\Models;

// use App\Enums\JobPostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    // enum casting
    // protected $casts = [
    //     'status' => JobPostStatus::class,
    // ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_job_posts', 'job_post_id', 'user_id');
    }

    public function applied_jobs(): HasMany
    {
        return $this->hasMany(AppliedJob::class, 'job_id', 'id');
    }

    // public function scopegetByUser($query)
    // {
    //     $employer = Type::where('slug', 'employer')->first();

    //     $query->whereHas('user', function ($q) use ($employer) {
    //         $q->where('id', $)
    //     });
    // }
    
    // scope function
    public function scopeFilterOn($query)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        if (request('category')) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', request('category'));
            });
        }

        if (request('type')) {
            $query->whereHas('type', function ($q) {
                $q->where('slug', request('type'));
            });
        }

        if (request('region')) {
            $query->whereHas('region', function ($q) {
                $q->where('slug', request('region'));
            });
        }

        if (request('sort')) {
            $query->orderBy('updated_at', request('sort'));
        }
    }

    public function scopeStatusAvailable($q)
    {
        $available = Status::isType('job_status')->first();
        $q->where('status_id', $available->id);
    }
}
