<?php declare(strict_types = 1);

namespace App\Repositories\Booking;

use App\Models\Activity;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookingRepository implements BookingInterface
{
    public $book;

    public function __construct(Booking $book)
    {
        $this->book = $book;
    }

    public function getAll(): Collection
    {
        return $this->book->getAll();
    }

    public function bookActivity(Request $request): Response
    {
        $params = $request->request->all();//dd($params);
        $activity_id = $params['params']['activity_id'];
        $n_persons = $params['params']['n_persons'];
        $date = $params['params']['date'];

        $activity = Activity::findOrfail($activity_id)->first();
        $price = $activity->price;
        $bookPrice = $n_persons * $price;

       // Store

        $booking = new Booking();
        $booking->setNPersons((int)$n_persons);
        $booking->setBookPrice($bookPrice);
        $booking->setBookDate(Carbon::now());
        $booking->setActivityDate(Carbon::createFromFormat('Y-m-d', $date));
        $booking->setActivityId($activity_id);
        $booking->save();

        return new Response('ok',200);
    }

}
