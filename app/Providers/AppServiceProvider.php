<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
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
        RedirectResponse::macro('withSuccessMessage', function ($message) {
            return RedirectResponse::with('flash.message', 'Success! '.$message)->with('flash.class', 'success');
        });

        RedirectResponse::macro('withErrorMessage', function ($message) {
            return RedirectResponse::with('flash.message', 'Error! '.$message)->with('flash.class', 'danger');
        });
    }
}
