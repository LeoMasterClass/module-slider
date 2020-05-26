<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // permet de naviguer dans les différentes pages selon le role
        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRole(['admin']);
        });

        // permet de modifier un utilisateur si Admin
        Gate::define('edit-users', function ($user) {
            return $user->isAdmin();
        });

        // permet de supprimer un utilisateur si Admin
        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }
}
