<?php declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Repositories\Booking\BookingInterface;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookingsController extends Controller
{
    /**
     * @var BookingInterface
     */
    private $book;

    public function __construct(BookingInterface $booking)
    {
        $this->book = $booking;
    }

    public function book(Request $request): Response
    {
        return $this->book->bookActivity($request);
    }

}
