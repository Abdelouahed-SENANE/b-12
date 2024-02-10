<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function driver() {
        return $this->hasOne(Driver::class);
    }

    public function passenger()
    {
        return $this->hasOne(Passenger::class);
    }

    public function route()
    {
        return $this->hasOne(Route::class);
    }
}
