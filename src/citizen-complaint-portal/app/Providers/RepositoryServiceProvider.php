<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\ReportRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ResidentRepository;
use App\Interface\AuthRepositoryInterface;
use App\Interface\ReportRepositoryInterface;
use App\Repositories\ReportStatusRepository;
use App\Interface\ResidentRepositoryInterface;
use App\Repositories\ReportCategoryRepository;
use App\Interface\ReportStatusRepositoryInterface;
use App\Interface\ReportCategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class );
        $this->app->bind(ResidentRepositoryInterface::class, ResidentRepository::class );
        $this->app->bind(ReportCategoryRepositoryInterface::class, ReportCategoryRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(ReportStatusRepositoryInterface::class, ReportStatusRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
