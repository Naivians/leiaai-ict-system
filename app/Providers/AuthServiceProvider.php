<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        $this->registerPolicies();

        Gate::define('simulator', function (User $user) {
            return in_array($user->position, ['guest', 'technician', 'dev']);
        });

        Gate::define('guest', function (User $user) {
            return $user->position == 'guest';
        });

        Gate::define('technician', function (User $user) {
           return in_array($user->position, ['technician', 'dev']);
        });

        Gate::define('developer', function (User $user) {
            return $user->position == 'dev';
        });

        Gate::define('tickets',function (User $user){
            return in_array($user->position, ['dev', 'ict_admin', 'ict_staff']);
        });
    }
}
