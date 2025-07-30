<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Gamer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get or create a competition
        $competition = Competition::firstOrCreate([
            'name' => 'League Championship 2025',
            'type' => \App\Enums\CompetitionType::Knockout,
        ]);

        // 2. Create gamers if none exist
        $gamers = Gamer::factory()->count(32)->create();

        // 3. Attach gamers to the competition
        foreach ($gamers as $gamer) {
            $gamer->competitions()->attach($competition);
        }

        $this->command->info('✅ 32 Gamers attached to the competition.');
    }
}
