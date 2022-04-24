<?php

namespace App\Providers;

use App\View\Composers\AffiliatedComposer;
use App\View\Composers\ContiniousComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\ProgramComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.front.header', ProgramComposer::class);
        View::composer('layouts.front.header', AffiliatedComposer::class);
        View::composer('layouts.front.header', ContiniousComposer::class);
    }
}
