<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\View\Components\Navigation\NavigationLink;

class TwillAdminMenuProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        TwillNavigation::addLink(NavigationLink::make()->forModule('products')->title("Products"));
        TwillNavigation::addLink(NavigationLink::make()->forModule('contacts')->title("Contacts"));
    }
}
