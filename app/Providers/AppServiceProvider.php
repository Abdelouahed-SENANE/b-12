<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('admin' , function(User $user) {
            $admin = Admin::where('user_id' , $user->id)->get();
            if (sizeof($admin) ) {
                return true;
            }else{
                return false;
            }
        });
        Blade::if('admin' , function () {
            return auth()->user()->can('admin');
        });
        Gate::define('passenger', function (User $user) {
            $passenger = Passenger::where('user_id' , $user->id)->get();
            if (sizeof($passenger) ) {
                return true;
            }else{
                return false;
            }
        });
        Blade::if('passenger' , function () {
            return auth()->user()->can('passenger');
        });
        Gate::define('driver', function (User $user) {
            $driver = Driver::where('user_id', $user->id)->get();
            if (sizeof($driver)) {
                return true;
            } else {
                return false;
            }
        });
        Blade::if('driver' , function () {
            return auth()->user()->can('driver');
        });
    }
}
