<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Posts;
use App\Models\User;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Posts::class => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* 
         * Migrado para PostPolicy
        Gate::define('update-post', function (User $user, Posts $post) {
            return $user->id == $post->user_id;
        }); 
         */

        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }
}
