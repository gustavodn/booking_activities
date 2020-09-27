<?php declare(strict_types = 1);

namespace App\Repositories\Activity;

use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;

interface ActivityInterface {
public function getAll(): Collection;
public function findActivitiesByDate(Request $request): array;
}
