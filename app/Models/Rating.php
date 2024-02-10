<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function driver() {
        return $this->hasOne(Driver::class);
    }

    public function passenger()
    {
        return $this->hasOne(Passenger::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
