<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\EmployeePolicy;
use App\Policies\RolePolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class       => EmployeePolicy::class,
        Role::class       => RolePolicy::class,
        // Permission::class => PermissionPolicy::class,
        // CustomPage::class => CustomPagePolicy::class,
        // SettingsPage::class => SettingsPagePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        FacadesGate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true: null;     
        });
    }
}
