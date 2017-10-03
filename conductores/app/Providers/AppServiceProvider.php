<?php

namespace App\Providers;

use App\User;
use App\Conduct;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::created(function ($user) {
            
            if ($user->roles == 1) {
                $conduct = new Conduct;
        
                $conduct->short='';
                $conduct->car_m='';
                $conduct->body='';
                $conduct->phone='';
                $conduct->car_ma='';
                $conduct->car_state='';


                $conduct->user_id = $user->id;
                $conduct->name = $user->name;
                $conduct->last_name = $user->last_name;
                $conduct->state = $user->state;

                $conduct->save();
            }
            
        });
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
