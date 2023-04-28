<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        // セキュア設定
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
        // view()->composer内でやっているのは、Authの情報を取るためなので、なくてもOK
        view()->composer('*', function ($view)
        {
            $user = Auth::user();
            // ポイント：view()->shareで変数を定義してあげることで、冗長にならなくなる。
            view()->share([
                'USER'=> $user,
            ]);
        });
    }
}
