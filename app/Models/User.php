<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile',
        'company_name',
        'company_type',
        'desc',
        'region_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function jobs(): HasMany  // employer create jobs
    {
        return $this->hasMany(JobPost::class, 'user_id', 'id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
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

    public function scopeNotAdmin($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['Admin', 'Developer']);
        });
    }

    public function scopeAdmin($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->whereIn('name', ['Admin', 'Developer']);
        });
    }

    public function scopeEmployer($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->whereIn('name', ['Employer']);
        });
    }

    public function scopeIsType($query, $type)
    {
        $query->whereHas('type', function ($q) use ($type) {
            $q->where('slug', $type);
        });
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
