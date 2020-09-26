<?php declare(strict_types = 1);

namespace App\Repositories\Activity;

use Illuminate\Database\Eloquent\Collection;

interface ActivityInterface {
public function getAll(): Collection;
}
