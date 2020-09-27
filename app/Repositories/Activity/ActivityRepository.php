<?php declare(strict_types = 1);

namespace App\Repositories\Activity;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

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
    public function findActivitiesByDate(Request $request): array
    {
        $params = $request->request->all();
        $date = $params['date'];
        $date = Carbon::createFromFormat('Y-m-d',  $date);
        return DB::table('activities')
            ->whereRaw('"'.$date.'" between `from` and `to`')
            ->orderBy('popularity_rating', 'desc')
            ->get()->toArray();
    }
}
