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
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasSuperAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'type_id'
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

    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    // }

    public function jobs(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function job_posts(): BelongsToMany
    {
        return $this->belongsToMany(JobPost::class, 'user_job_posts', 'user_id', 'job_post_id');
    }

    public function scopeNotAdmin($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->whereNotIn('slug', ['admin', 'developer']);
        });
    }

    public function scopeAdmin($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->whereIn('slug', ['admin', 'developer']);
        });
    }

    public function scopeFilterOn($query)
    {
        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        if (request('sort')) {
            $query->orderBy('name',request('sort'));
        }

        if (request('role')) {
            $query->whereHas('roles', function ($q) {
                $q->where('slug', request('role'));
            });
        }
    }
}
