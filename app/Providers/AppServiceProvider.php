<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Helpers\QueryHelper;
use Carbon\Carbon;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

          // adds user info to all views
          view()->composer('partials.nav', function ($view) {
            $view->with('user_logged', Auth::check());

            if (Auth::check()) {
              $view->with('user', Auth::user());

              // count number of unread discussions.
              $view->with('unread_discussions', QueryHelper::getUnreadDiscussionsCount());
              $view->with('user_groups', QueryHelper::getUserGroups());
            }
          });

          // set correct locale for Carbon
          Carbon::setLocale(config('app.locale'));
          //Carbon::setLocale(Session::get('locale', env('APP_DEFAULT_LOCALE', 'nl'))); // TODO this doesn't work

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
