<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Observers\QnAObserver;
use App\Observers\UserObserver;
use App\Post;
use App\QnA;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
        QnA::observe(QnAObserver::class);
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
