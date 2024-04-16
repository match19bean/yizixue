<?php

namespace App\Providers;

use App\Observers\PostCategoryObserver;
use App\Observers\PostObserver;
use App\Observers\QnAObserver;
use App\Observers\SkillObserver;
use App\Observers\UserObserver;
use App\Post;
use App\PostCategory;
use App\QnA;
use App\Skill;
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
        Skill::observe(SkillObserver::class);
        PostCategory::observe(PostCategoryObserver::class);
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
