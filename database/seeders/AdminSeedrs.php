<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeedrs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::all()->each(function ($user) {
            Admin::factory()->create(['user_id' => $user->id]);
        });
    }
}
