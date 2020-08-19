<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

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

        Gate::define('superadmin.index', function ($user) {
            if( in_array( $user->refrol, array( '1' ) ) ){ return true;}
            else{
                return false;
            }
        });

        Gate::define('admin.index', function ($user) {
            if( in_array( $user->refrol, array( '2' ) ) ) return true;
        });

        Gate::define('profesor.index', function ($user) {
            if( in_array( $user->refrol, array( '3' ) ) ) return true;
        });

        Gate::define('alumno.index', function ($user) {
            if( in_array( $user->refrol, array( '4' ) ) ) return true;
        });

        
    }

}
