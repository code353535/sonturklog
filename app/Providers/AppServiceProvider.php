<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Anacategory;
use Illuminate\Support\Facades\View;

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
        Carbon::setLocale(config('app.locale'));

        view()->composer('components.front.kategoricanvas', function ($view) {
            $view->with('category',
            $category = Category::where('anacategory_id', '1')->orderBy('ad')->get());
        });
        view()->composer('components.front.kategoricanvas', function ($view) {
            $view->with('anacategory',
            $AAcategory = Category::where('anacategory_id', '2')->orderBy('ad')->get());
        });
    }
}
