<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use Auth;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        Broadcast::routes(['middleware' => ['web','auth:accountant,admin,user']  ]);


        // Broadcast::channel('App.User.*', function ($user, $userId) {
        //     return (int) $user->id === (int) $userId;
        // });
        //

        require base_path('routes/channels.php');
    }
}
