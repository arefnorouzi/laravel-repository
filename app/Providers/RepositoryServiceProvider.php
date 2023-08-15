<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\PostInterface;
use App\Interfaces\WriteCategoryInterface;
use App\Interfaces\WritePostInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\WriteCategoryRepository;
use App\Repositories\WritePostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(WriteCategoryInterface::class, WriteCategoryRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(WritePostInterface::class, WritePostRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
