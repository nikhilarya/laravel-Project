<?php

namespace App\Providers;

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
        Schema::defaultStringLength(191); //Solved by increasing StringLength

        view()->composer('layout.sidebar', function ($view)
        {
            $view->with('archives', \App\Article::archives());
            $view->with('tags', \App\Tag::has('articles')->pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            if ($this->app->environment() == 'local') {
                $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            }
    }
}
