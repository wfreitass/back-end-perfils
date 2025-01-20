<?php

namespace App\Providers;

use App\Interfaces\PerfilRepositoryInterface;
use App\Interfaces\PerfilServiceInterface;
use App\Interfaces\TarefaRepositoryInterface;
use App\Interfaces\TarefaServiceInterface;
use App\Repositories\PerfilRepository;
use App\Repositories\TarefaRepository;
use App\Services\PerfilService;
use App\Services\TarefaService;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PerfilRepositoryInterface::class, PerfilRepository::class);
        $this->app->bind(PerfilServiceInterface::class, PerfilService::class);

        $this->app->bind(TarefaRepositoryInterface::class, TarefaRepository::class);
        $this->app->bind(TarefaServiceInterface::class, TarefaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::enablePasswordGrant();
    }
}
