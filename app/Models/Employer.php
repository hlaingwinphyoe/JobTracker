<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Permission\Traits\HasRoles;

class Employer extends Authenticatable implements FilamentUser
{
    use HasFactory, HasRoles;

    protected array $guard_name = ['employer', 'web'];

    protected $table = 'employers';

    protected $guarded = [];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

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

    public function job_posts(): BelongsToMany  // employee's favourite posts
    {
        return $this->belongsToMany(JobPost::class, 'user_job_posts', 'user_id', 'job_post_id');
    }

    public function applied_jobs(): HasMany  // employee applied jobs
    {
        return $this->hasMany(AppliedJob::class, 'user_id', 'id');
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

        if (request('role')) {
            $query->whereHas('roles', function ($q) {
                $q->where('name', request('role'));
            });
        }
    }
}
