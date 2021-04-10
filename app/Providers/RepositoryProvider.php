<?php


namespace App\Providers;


use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\PostRepository;

class RepositoryProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }
}
