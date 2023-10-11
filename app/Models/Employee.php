<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable, HasApiTokens;

    protected array $guard = ['employee', 'web'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile',
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

    public function medias(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediabble');
    }

    public function job_posts(): BelongsToMany  // employee's favourite posts
    {
        return $this->belongsToMany(JobPost::class, 'user_job_posts', 'user_id', 'job_post_id');
    }

    public function applied_jobs(): HasMany  // employee applied jobs
    {
        return $this->hasMany(AppliedJob::class, 'user_id', 'id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
