<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeedrs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Route::factory()->count(10)->create();
    }
}
