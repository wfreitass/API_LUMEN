<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\User;
use App\Repositories\CarRepositoryEloquent;
use App\Repositories\CarRepositoryInterface;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepositoryEloquent');
        $this->app->bind(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        $this->app->bind('App\Repositories\UserRepositoryInterface', function(){
            return new UserRepositoryEloquent(new User());
        });
        $this->app->bind(CarRepositoryInterface::class, CarRepositoryEloquent::class);
        $this->app->bind('App\Repositories\CarRepositoryInterface', function(){
            return new CarRepositoryEloquent(new Car());
        });
    }

    public function boot()
    {
        //
    }
}
