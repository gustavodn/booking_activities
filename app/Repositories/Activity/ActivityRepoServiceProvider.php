<?php declare(strict_types = 1);

namespace App\Repositories\Activity;

use Illuminate\Support\ServiceProvider;

class ActivityRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services
     *
     * @return void
     */

    public function register(): void
    {
        $this->app->bind(ActivityInterface::class, ActivityRepository::class);
    }

}
