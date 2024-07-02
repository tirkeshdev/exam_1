<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

//        Model::preventLazyLoading(!$this->app->isProduction());

        View::composer('app.nav', function ($view) {
            $categories = Category::where('parent_id', null)
                ->withCount('child')
                ->get();

            $categorySubs = [];
            foreach ($categories as $category) {
                $categorySubs[] = [
                    'category' => $category,
                    'subs' => Category::where('parent_id', $category->id)
                        ->withCount('products')
                        ->get(),
                ];
            }
            $view->with([
                'categorySubs' => $categorySubs
            ]);
        });

    }
}
