<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Employer extends Model
{
    use HasFactory;

    // protected array $guard = ['employer', 'web'];
    protected $guard = 'web';

    protected $table = 'users';

    protected $guarded = [];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function medias(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediabble');
    }

    public function jobs(): HasMany  // employer create jobs
    {
        return $this->hasMany(JobPost::class, 'user_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeFilterOn($query)
    {
        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%')->orWhere('company_name', 'like', '%' . request('search') . '%')->orWhere('company_type', 'like', '%' . request('search') . '%');
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
            $query->orderBy('name', request('sort'));
        }
    }
}
