<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Loan;
use App\Observers\LoanObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer(['welcome', 'components.borrower.navigation.navbar'], function ($view) {
            $top_categories = Category::withCount('book')
                ->orderBy('book_count', 'desc')
                ->limit(7)
                ->get();
            
            $view->with('top_categories', $top_categories);
        });
        Loan::observe(LoanObserver::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
