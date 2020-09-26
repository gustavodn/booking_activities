<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['activity_id', 'n_persons', 'price', 'book_date', 'activity_date'];

    public function getAll(): Collection
    {
        return self::all();
    }
}
