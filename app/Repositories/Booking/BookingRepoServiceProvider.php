<?php declare(strict_types = 1);

namespace App\Repositories\Booking;

use Illuminate\Support\ServiceProvider;

class BookingRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {

    }

    /**
     * Register the application services
     *
     * @return void
     */

    public function register(): void
    {
        $this->app->bind(BookingInterface::class, BookingRepository::class);
    }

}
