<?php

namespace App\Providers;

use App\Repositories\ArticleRepo; 
use App\Repositories\ArticleRepoInterface;      
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArticleRepoInterface::class, ArticleRepo::class);
    }

    public function boot(): void
    {
        //
    }
}