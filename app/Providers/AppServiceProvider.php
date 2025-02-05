<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $menu = [
            [
                'title' => 'Новости',
                'alias' => 'news::categories'
            ],
            [
                'title' => 'Отзывы',
                'alias' => 'feedback::create'
            ],
            [
                'title' => 'Админка',
                'alias' => 'admin::news::index'
            ],
        ];

        View::share('menu', $menu);
    }
}
