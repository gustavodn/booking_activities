<?php declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Repositories\Activity\ActivityInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;

class ActivitiesController extends Controller
{
    /**
     * @var ActivityInterface
     */
    private $activity;

    public function __construct(ActivityInterface $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Activity|Activity[]|Collection
     */
    public function index(): Collection
    {
        return $this->activity->getAll();
    }

    public function find(Request $request): array
    {
        return $this->activity->findActivitiesByDate($request);

    }

}
