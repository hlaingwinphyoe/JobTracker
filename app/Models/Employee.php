<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';

    protected $table = 'employees';

    protected $guarded = [];

    public function medias(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediabble');
    }
}
