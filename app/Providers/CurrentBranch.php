<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CurrentBranch extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind('current-branch' , function(){

            if (session()->has('branch-id')) {
                return [
                    'result' => true,
                    'current-branch'=>session('branch-id')];
            }

            return ['result' => false];
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
