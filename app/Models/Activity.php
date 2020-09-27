<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'description','price', 'from', 'to', 'popularity_rating'];

    public function getAll(): Collection
    {
        return self::all();
    }

    // Setters and Getters
    public function setTitle(String $value): void
    {
        $this->attributes['title'] = $value;
    }
    public function getTitle(): String
    {
        return $this->attributes['title'];
    }
    public function setDescription(String $value): void
    {
        $this->attributes['description'] = $value;
    }
    public function getDescription(): String
    {
        return $this->attributes['description'];
    }
    public function setPrice(int $value): void
    {
        $this->attributes['price'] = $value;
    }
    public function getPrice(): String
    {
        return $this->attributes['price'];
    }
    public function setFrom(\DateTime $value): void
    {
        $this->attributes['from'] = $value;
    }
    public function getFrom(): \DateTime
    {
        return $this->attributes['from'];
    }
    public function setTo(\DateTime $value): void
    {
        $this->attributes['to'] = $value;
    }
    public function getTo(): \DateTime
    {
        return $this->attributes['to'];
    }
    public function setPopularityRating(int $value): void
    {
        $this->attributes['popularity_rating'] = $value;
    }
    public function getPopularityRating(): int
    {
        return $this->attributes['popularity_rating'];
    }

}
