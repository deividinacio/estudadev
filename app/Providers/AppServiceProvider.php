<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\AlunoRepository;
use App\Interface\AlunoRepositoryInterface;
use App\Services\AlunoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AlunoRepositoryInterface::class, AlunoRepository::class);
        
        $this->app->bind(AlunoService::class, function($app){
            return new AlunoService($app->make(AlunoRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
