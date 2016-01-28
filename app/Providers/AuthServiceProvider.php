<?php

namespace App\Providers;

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
       'App\Action' => 'App\Policies\ActionPolicy',
       'App\Comment' => 'App\Policies\CommentPolicy',
       'App\Discussion' => 'App\Policies\DiscussionPolicy',
       'App\File' => 'App\Policies\FilePolicy',
       'App\Group' => 'App\Policies\GroupPolicy',
       'App\User' => 'App\Policies\UserPolicy',
     ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
