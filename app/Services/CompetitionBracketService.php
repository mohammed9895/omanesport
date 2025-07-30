<?php

namespace App\Services;

use App\Models\Competition;
use App\Models\CompetitionGroup;
use App\Models\CompetitionMatch;
use App\Models\Gamer;
use Illuminate\Database\Eloquent\Collection;

class CompetitionBracketService
{
    public function generateKnockoutMatches(Competition $competition, Collection $participants): void
    {
        // 🧹 Delete old knockout matches
        $competition->matches()->whereNull('group_id')->delete();

        $participants = $participants->shuffle()->values();
        $totalPlayers = $participants->count();
        $totalRounds = (int) ceil(log($totalPlayers, 2));

        $roundLabels = [
            1 => 'Final',
            2 => 'Semi Final',
            3 => 'Quarter Final',
            4 => 'Round of 16',
            5 => 'Round of 32',
            6 => 'Round of 64',
            7 => 'Round of 128',
        ];

        $currentRound = $totalRounds;
        $round = 1;
        $matchNumber = 1; // used for referencing placeholder

        $matchMap = []; // maps round => list of match IDs or placeholders

        // 🔁 Generate Round 1 with real players and save match IDs
        $currentMatches = [];

        while ($participants->count() >= 2) {
            $home = $participants->shift();
            $away = $participants->shift();

            $match = \App\Models\CompetitionMatch::create([
                'competition_id' => $competition->id,
                'home_id' => $home->id,
                'away_id' => $away->id,
                'round' => $round,
                'round_name' => $roundLabels[$currentRound] ?? "Round $currentRound",
                'home_score' => null,
                'away_score' => null,
                'winner_id' => null,
                'group_id' => null,
            ]);

            $currentMatches[] = $match->id;
            $matchNumber++;
        }

        // If odd, carry bye
        if ($participants->count() === 1) {
            $bye = $participants->pop();

            $match = \App\Models\CompetitionMatch::create([
                'competition_id' => $competition->id,
                'home_id' => $bye->id,
                'away_id' => null,
                'round' => $round,
                'round_name' => $roundLabels[$currentRound] ?? "Round $currentRound",
                'home_score' => null,
                'away_score' => null,
                'winner_id' => null,
                'group_id' => null,
            ]);

            $currentMatches[] = $match->id;
            $matchNumber++;
        }

        $matchMap[$round] = $currentMatches;
        $currentRound--;
        $round++;

        // 🔁 Generate next rounds with placeholders
        while (count($matchMap[$round - 1]) >= 2) {
            $previousMatches = $matchMap[$round - 1];
            $currentMatches = [];

            while (count($previousMatches) >= 2) {
                $match1 = array_shift($previousMatches);
                $match2 = array_shift($previousMatches);

                $match = \App\Models\CompetitionMatch::create([
                    'competition_id' => $competition->id,
                    'home_id' => null,
                    'away_id' => null,
                    'placeholder_home' => "Winner of Match #$match1",
                    'placeholder_away' => "Winner of Match #$match2",
                    'round' => $round,
                    'round_name' => $roundLabels[$currentRound] ?? "Round $currentRound",
                    'home_score' => null,
                    'away_score' => null,
                    'winner_id' => null,
                    'group_id' => null,
                ]);

                $currentMatches[] = $match->id;
                $matchNumber++;
            }

            // If bye in this round
            if (count($previousMatches) === 1) {
                $match1 = array_shift($previousMatches);

                $match = \App\Models\CompetitionMatch::create([
                    'competition_id' => $competition->id,
                    'home_id' => null,
                    'away_id' => null,
                    'placeholder_home' => "Winner of Match #$match1",
                    'placeholder_away' => null,
                    'round' => $round,
                    'round_name' => $roundLabels[$currentRound] ?? "Round $currentRound",
                    'home_score' => null,
                    'away_score' => null,
                    'winner_id' => null,
                    'group_id' => null,
                ]);

                $currentMatches[] = $match->id;
                $matchNumber++;
            }

            $matchMap[$round] = $currentMatches;
            $currentRound--;
            $round++;
        }
    }

    public function generateLeagueMatches(CompetitionGroup $group, Collection $participants)
    {
        $participants = $participants->values(); // resets numeric keys

        $count = $participants->count();

        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                CompetitionMatch::create([
                    'competition_id' => $group->competition_id,
                    'group_id' => $group->id,
                    'home_id' => $participants[$i]->id,
                    'away_id' => $participants[$j]->id,
                    'round' => 1,
                ]);
            }
        }
    }

    public function generateKnockoutBracketFromLeagueStructure(Competition $competition): void
    {
        $groups = $competition->groups()->orderBy('name')->get(); // or orderBy('id')
        $pairings = [];

        // Round of 16 → based on group pairings (1st vs 2nd from another group)
        for ($i = 0; $i < $groups->count(); $i += 2) {
            if (!isset($groups[$i + 1])) {
                continue;
            }

            $groupA = $groups[$i];
            $groupB = $groups[$i + 1];

            $pairings[] = ['1st Group ' . $groupA->name, '2nd Group ' . $groupB->name];
            $pairings[] = ['1st Group ' . $groupB->name, '2nd Group ' . $groupA->name];
        }

        // Delete previous knockout matches
        $competition->matches()->whereNull('group_id')->delete();

        $matchIds = [];

        // Create Round of 16 matches
        foreach ($pairings as $index => $pair) {
            $match = \App\Models\CompetitionMatch::create([
                'competition_id' => $competition->id,
                'home_id' => null,
                'away_id' => null,
                'placeholder_home' => $pair[0],
                'placeholder_away' => $pair[1],
                'round' => 1,
                'round_name' => 'Round of 16',
                'group_id' => null,
            ]);

            $matchIds['R16'][] = $match->id;
        }

        // Helper to create future round matches with placeholders
        $this->generateNextRound($competition, $matchIds['R16'], 2, 'Quarter Final', $matchIds);
        $this->generateNextRound($competition, $matchIds['QF'], 3, 'Semi Final', $matchIds);
        $this->generateNextRound($competition, $matchIds['SF'], 4, 'Final', $matchIds);
    }

    private function generateNextRound(Competition $competition, array $previousMatchIds, int $round, string $roundName, array &$matchIds): void
    {
        $nextRoundKey = match($roundName) {
            'Quarter Final' => 'QF',
            'Semi Final' => 'SF',
            'Final' => 'F',
            default => 'R' . $round,
        };

        $matchIds[$nextRoundKey] = [];

        for ($i = 0; $i < count($previousMatchIds); $i += 2) {
            $homeSource = 'Winner of Match #' . $previousMatchIds[$i];
            $awaySource = isset($previousMatchIds[$i + 1])
                ? 'Winner of Match #' . $previousMatchIds[$i + 1]
                : 'TBD';

            $match = \App\Models\CompetitionMatch::create([
                'competition_id' => $competition->id,
                'home_id' => null,
                'away_id' => null,
                'placeholder_home' => $homeSource,
                'placeholder_away' => $awaySource,
                'round' => $round,
                'round_name' => $roundName,
                'group_id' => null,
            ]);

            $matchIds[$nextRoundKey][] = $match->id;
        }
    }


    public function resolveKnockoutMatchParticipants(Competition $competition): void
    {
        $matches = $competition->matches()->whereNull('group_id')->get();

        foreach ($matches as $match) {
            // Handle home placeholder
            if (empty($match->home_id) && !empty($match->placeholder_home)) {
                $gamer = $this->getGamerFromPlaceholder($competition, $match->placeholder_home);
                if ($gamer) {
                    $match->home_id = $gamer->id;
                }
            }

            // Handle away placeholder
            if (empty($match->away_id) && !empty($match->placeholder_away)) {
                $gamer = $this->getGamerFromPlaceholder($competition, $match->placeholder_away);
                if ($gamer) {
                    $match->away_id = $gamer->id;
                }
            }

            $match->save();
        }
    }

    protected function getGamerFromPlaceholder(Competition $competition, string $placeholder): ?Gamer
    {
        $cleaned = str_replace('Group Group', 'Group', $placeholder);

        // Match format like "1st Group A"
        if (!preg_match('/(\d+)(?:st|nd|rd|th)\s+Group\s+([A-Z])/i', $cleaned, $matches)) {
            return null;
        }

        $position = (int) $matches[1];
        $groupName = 'Group ' . strtoupper($matches[2]);

        $group = CompetitionGroup::where('competition_id', $competition->id)
            ->where('name', $groupName)
            ->first();

        if (! $group) {
            return null;
        }

        $gamers = $group->participants;

        $ranked = $gamers->sortByDesc(function ($gamer) use ($group) {
            $matches = CompetitionMatch::where('group_id', $group->id)
                ->where(function ($q) use ($gamer) {
                    $q->where('home_id', $gamer->id)->orWhere('away_id', $gamer->id);
                })
                ->get();

            $points = 0;
            foreach ($matches as $match) {
                if (is_null($match->home_score) || is_null($match->away_score)) continue;

                if ($match->winner_id === $gamer->id) {
                    $points += 3;
                } elseif ($match->home_score === $match->away_score) {
                    $points += 1;
                }
            }

            return $points;
        })->values();

        return $ranked[$position - 1] ?? null;
    }
}
