<?php declare(strict_types = 1);

namespace App\Repositories\Activity;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository implements ActivityInterface
{
    public $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function getAll(): Collection
    {
        return $this->activity->getAll();
    }
}
