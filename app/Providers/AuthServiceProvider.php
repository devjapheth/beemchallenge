<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isSuper',function($user){
            return $user->user_type == 'super';
        });

        $gate->define('isAdmin',function($user){
            return $user->user_type == 'admin';
        });

        $gate->define('isStudent',function($user){
            return $user->user_type == 'student';
        });

        $gate->define('isAccountant',function($user){
            return $user->user_type == 'accountant';
        });

        $gate->define('isLibrarian',function($user){
            return $user->user_type == 'librarian';
        });

    }
}
