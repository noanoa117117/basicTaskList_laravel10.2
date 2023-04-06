<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Timeline;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Route::bind('trashed_text',function($id){
            return Timeline::onlyTrashed()->find($id);
        });
    }
}
