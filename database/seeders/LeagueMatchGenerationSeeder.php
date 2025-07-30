<?php

namespace Database\Seeders;

use App\Enums\CompetitionType;
use App\Models\Competition;
use App\Models\CompetitionGroup;
use App\Models\Gamer;
use App\Services\CompetitionBracketService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeagueMatchGenerationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create a League competition
        $competition = Competition::create([
            'name' => 'League with Groups A-H',
            'type' => CompetitionType::League,
        ]);

        // 2. Create 32 gamers
        $gamers = Gamer::factory()->count(32)->create();

        // 3. Split into 8 groups of 4
        $chunks = $gamers->shuffle()->chunk(4);
        $groupNames = range('A', 'H');

        $service = new CompetitionBracketService();

        foreach ($chunks as $index => $groupGamers) {
            // Create group
            $group = CompetitionGroup::create([
                'competition_id' => $competition->id,
                'name' => 'Group ' . $groupNames[$index],
            ]);

            // Attach gamers to group
            foreach ($groupGamers as $gamer) {
                $gamer->competitionGroups()->attach($group);
            }

            // Generate matches for the group
            $service->generateLeagueMatches($group, $groupGamers);
        }

        $this->command->info('✅ 32 gamers split into 8 groups with league matches generated.');
    }
}
