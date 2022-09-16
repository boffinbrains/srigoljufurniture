<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Models\Roles;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function($user){
            $role = Roles::where('id',$user->role)->pluck('title')->toArray();
            return in_array('Admin',$role) ? Response::allow()
            : Response::deny('You must be an Administrator.');
        });
        Gate::define('isEmployee', function($user){
            $role = Roles::where('id',$user->role)->pluck('title')->toArray();
            return in_array('Employee',$role) ? Response::allow()
            : Response::deny('You must be an Employeer.');
        });
        Gate::define('isManager', function($user){
            $role = Roles::where('id',$user->role)->pluck('title')->toArray();
            return in_array('Manager',$role) ? Response::allow()
            : Response::deny('You must be an Manager.');
        });
        Gate::define('isVendor', function($user){
            $role = Roles::where('id',$user->role)->pluck('title')->toArray();
            return in_array('Vendor',$role) ? Response::allow()
            : Response::deny('You must be an Vendor.');
        });
    }
}
