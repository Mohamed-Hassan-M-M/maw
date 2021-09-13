<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        ResponseFactory::macro('api', function ($data = null, $errorCode = 0, $errorDescription = '') {
            return response()->json([
                'data' => $data,
                'errorCode' => $errorCode,
                'errorDescription' => $errorDescription,
            ]);
        });

        Paginator::useBootstrap();

    }//end of boot

}//end of app service provider
