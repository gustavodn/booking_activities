<?php declare(strict_types = 1);

namespace App\Repositories\Booking;

use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface BookingInterface {
    public function getAll(): Collection;
    public function bookActivity(Request $request): Response;
}
