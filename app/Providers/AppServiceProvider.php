<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gallery;
use App\Observers\GalleryObserver;

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
        Gallery::observe(GalleryObserver::class);
    }
}
