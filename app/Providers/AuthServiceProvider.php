<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        Gate::define('create-user', function ($user) {
            return $user->role === 'admin'; // Verifica si el usuario es administrador
        });

        Gate::define('edit-user', function ($user) {
            return $user->role === 'admin'; // Verifica si el usuario es administrador
        });

        Gate::define('delete-user', function ($user) {
            return $user->role === 'admin'; // Verifica si el usuario es administrador
        });
    }
}
