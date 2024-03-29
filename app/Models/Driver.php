<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
}
