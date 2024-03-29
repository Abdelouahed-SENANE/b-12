<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
