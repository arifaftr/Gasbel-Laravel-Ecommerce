<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\CartService;

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
        // Share cart item count with all views for navbar badge
        View::composer('*', function ($view) {
            try {
                $cartService = new CartService();
                $cart = $cartService->getCart(false);
                $count = $cart ? $cart->items->sum('quantity') : 0;
            } catch (\Throwable $e) {
                $count = 0;
            }
            $view->with('cartItemCount', $count);
        });
    }
}
