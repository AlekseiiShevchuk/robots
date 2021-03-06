<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Languages
        Gate::define('language_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('language_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Maps
        Gate::define('map_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('map_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('map_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('map_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('map_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Localized maps
        Gate::define('localized_map_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_map_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_map_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_map_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_map_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Actions
        Gate::define('action_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('action_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('action_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('action_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('action_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Localized actions
        Gate::define('localized_action_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_action_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_action_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_action_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('localized_action_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Translation items
        Gate::define('translation_item_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('translation_item_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Settings
        Gate::define('setting_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('setting_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
