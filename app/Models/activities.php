<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    protected $fillable = ['title', 'description', 'from', 'to', 'popularity_rating'];
}
