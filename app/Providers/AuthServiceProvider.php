<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Product'=>'App\Policies\ProductPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-warehouse', function (User $user, Warehouse $warehouse){
            return $user->type=='admin' || $user->id==$warehouse->user_id;
        });

        Gate::define('delete-warehouse', function (User $user, Warehouse $warehouse){
            return $user->type=='admin' || $user->id==$warehouse->user_id;
        });

        //
    }
}
