<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LoanRepositoryContract;
use App\Repositories\LoanRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoanRepositoryContract::class, LoanRepository::class);
        $this->app->bind(LoanServiceInterface::class, LoanService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
