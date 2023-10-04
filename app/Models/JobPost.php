<?php

namespace App\Models;

// use App\Enums\JobPostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // scope function
    public function scopeFilterOn($query)
    {
        if(request('category_id'))
        {
            $query->whereHas('category', function ($q) {
                $q->where('slug',request('category_id'));
            });
        }

        if (request('sortSalary')) {
            $query->orderBy('salary',request('sortSalary'));
        }
    }
}
