<?php

namespace Database\Seeders;

use App\Models\Standingorder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StandingorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($user): void
    {
        Standingorder::factory()->count(2)->create([
            'user_id' => $user['id'],
        ]);
    }
}
