<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = ['activity_id', 'n_persons', 'book_price', 'book_date', 'activity_date'];
    /**
     * @var Activity
     */
    private $activity;

    public function getAll(): Collection
    {
        return self::all();
    }

    // Setters and Getters
    public function setActivityId(int $value): void
    {
        $this->attributes['activity_id'] = $value;
    }
    public function getActivityId(): int
    {
        return $this->attributes['activity_id'];
    }
    public function setNPersons(int $value): void
    {
        $this->attributes['n_persons'] = $value;
    }
    public function getNPersons(): int
    {
        return $this->attributes['n_persons'];
    }
    public function setBookPrice(float $value): void
    {
        $this->attributes['book_price'] = $value;
    }
    public function getBookPrice(): float
    {
        return $this->attributes['book_price'];
    }
    public function setBookDate(\DateTime $value): void
    {
        $this->attributes['book_date'] = $value;
    }
    public function getBookDate(): \DateTime
    {
        return $this->attributes['book_date'];
    }
    public function setActivityDate(\DateTime $value): void
    {
        $this->attributes['activity_date'] = $value;
    }
    public function getActivityDate(): \DateTime
    {
        return $this->attributes['activity_date'];
    }


    // Relationships
    public function Activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }


}
