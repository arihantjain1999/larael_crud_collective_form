<?php

namespace App\Providers;

use App\Http\Controllers\AccountController;
use Illuminate\Support\ServiceProvider;
use App\Interface\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
