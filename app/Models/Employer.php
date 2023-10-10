<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Permission\Traits\HasRoles;

class Employer extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guard = 'employer';

    protected $table = 'employers';

    protected $guarded = [];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function medias(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediabble');
    }
}
