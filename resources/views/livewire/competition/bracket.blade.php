<div x-data="{ tab: 'groups' }" class="relative">
    <section class="flex py-64 justify-center items-center relative after:content[''] after:w-full after:h-full after:absolute after:bottom-0 after:left-0 after:bg-gradient-to-t after:from-brand-sky-level-900 after:via-brand-sky-level-900/90 after:to-transparent after:z-10" style="background: url('/storage/{{ $competition->cover_image }}'); background-size: cover; background-position: center;">
        <div class="text-center text-white max-w-6xl z-20">
            <h3 class="text-lg tracking-wide mb-4">{{ \Carbon\Carbon::make($competition->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::make($competition->end_date)->format('M d, Y') }}</h3>
            <h1 class="font-bold uppercase text-6xl leading-tight tracking-[5px]">{{ $competition->name }}</h1>
        </div>
    </section>

    <div class="mt-10 flex justify-center space-x-6 text-white text-lg font-semibold">
        <button @click="tab = 'groups'" :class="{ 'border-b-2 border-white': tab === 'groups' }" class="pb-2 border-b-2 border-transparent uppercase text-xl tracking-wider">Groups</button>
        <button @click="tab = 'brackets'" :class="{ 'border-b-2 border-white': tab === 'brackets' }" class="pb-2 border-b-2 border-transparent uppercase text-xl tracking-wider">Knockout Bracket</button>
    </div>

    <div x-show="tab === 'brackets'" class="mt-10 mx-auto max-w-max">
        <div id="example" class="brackets-viewer"></div>
    </div>

    <div x-show="tab === 'groups'" class="mt-10  mx-auto px-4">
        <div class="grid grid-cols-2 container lg:grid-cols-2">
            @foreach ($competition->groups as $group)
                <div class="bg-brand-sky-level-900 text-white rounded-xl p-6 mb-8 shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">{{ $group->name }}</h2>
                    <table class="w-full table-auto border-collapse">
                        <thead class="bg-brand-sky-level-800 text-left">
                        <tr>
                            <th class="p-3">#</th>
                            <th class="p-3">Player</th>
                            <th class="p-3">Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $players = $group->participants->sortByDesc(function ($gamer) use ($group) {
                                $matches = \App\Models\CompetitionMatch::where('group_id', $group->id)
                                    ->where(function ($q) use ($gamer) {
                                        $q->where('home_id', $gamer->id)->orWhere('away_id', $gamer->id);
                                    })->get();
                                $points = 0;
                                foreach ($matches as $match) {
                                    if ($match->home_score == 0 || $match->away_score == 0) continue;
                                    if ($match->winner_id === $gamer->id) $points += 3;
                                    elseif ($match->home_score === $match->away_score) $points += 1;
                                }
                                return $points;
                            });
                        @endphp
                        @foreach ($players->values() as $index => $player)
                            <tr class="border-t border-white/10">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $player->name }}</td>
                                <td class="p-3">
                                    @php
                                        $points = 0;
                                        foreach (\App\Models\CompetitionMatch::where('group_id', $group->id)
                                            ->where(function ($q) use ($player) {
                                                $q->where('home_id', $player->id)->orWhere('away_id', $player->id);
                                            })->get() as $match) {
                                           if ($match->home_score == 0 || $match->away_score == 0) continue;
                                            if ($match->winner_id === $player->id) $points += 3;
                                            elseif ($match->home_score === $match->away_score) $points += 1;
                                        }
                                    @endphp
                                    {{ $points }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/brackets-viewer@latest/dist/brackets-viewer.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/brackets-viewer@latest/dist/brackets-viewer.min.js"></script>
    <style>
        .brackets-viewer {
            --primary-background: #092028;
            --secondary-background: #143741;
            --match-background: #143741;
            --font-color: white;
            --win-color: #22c55e;
            --loss-color: #ef4444;
            --label-color: #d1d5db;
            --hint-color: #9ca3af;
            --connector-color: #2d6b7d;
            --border-color: #2d6b7d;
            --border-hover-color: white;
            --text-size: 12px;
            --round-margin: 40px;
            --match-width: 150px;
            --match-horizontal-padding: 8px;
            --match-vertical-padding: 6px;
            --connector-border-width: 2px;
            --match-border-width: 1px;
            --match-border-radius: 0.5em;
        }
    </style>

    @php
        use Illuminate\Support\Str;

        $matches = $competition->matches->whereNull('group_id')->values();

        $placeholders = $competition->matches()
            ->whereNull('group_id')
            ->pluck('placeholder_home')
            ->merge($competition->matches()->whereNull('group_id')->pluck('placeholder_away'))
            ->unique()
            ->filter()
            ->values();

        $participantData = collect();
        $placeholderMap = [];
        $nextId = 100000;

        foreach ($competition->participants as $gamer) {
            $participantData->push([
                'id' => $gamer->id,
                'name' => $gamer->name ?? 'Unknown',
            ]);
        }

        foreach ($placeholders as $label) {
            $placeholderMap[$label] = $nextId;
            $participantData->push([
                'id' => $nextId++,
                'name' => $label,
            ]);
        }

        $matchData = $matches->map(function ($match) use ($placeholderMap) {
            $homeId = $match->home_id ?? ($placeholderMap[$match->placeholder_home] ?? null);
            $awayId = $match->away_id ?? ($placeholderMap[$match->placeholder_away] ?? null);

            return [
                'id' => $match->id,
                'stage_id' => 0,
                'round_id' => $match->round,
                'group_id' => 0,
                'child_count' => 0,
                'status' => 1,
                'opponent1' => [
                    'id' => $homeId,
                    'score' => $match->home_score,
                    'result' => $match->winner_id === $match->home_id ? 'win' : ($match->winner_id ? 'loss' : null),
                ],
                'opponent2' => [
                    'id' => $awayId,
                    'score' => $match->away_score,
                    'result' => $match->winner_id === $match->away_id ? 'win' : ($match->winner_id ? 'loss' : null),
                ],
            ];
        });

        $matchGames = [];

        $stageData = [[
            'id' => 0,
            'tournament_id' => 0,
            'name' => 'Knockout Stage',
            'type' => 'single_elimination',
            'number' => 1,
            'settings' => [
                'size' => $participantData->count(),
                'seedOrdering' => ['natural'],
                'consolationFinal' => false,
            ],
        ]];
    @endphp

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.bracketsViewer.render({
                stages: {!! json_encode($stageData) !!},
                matches: {!! json_encode($matchData) !!},
                matchGames: {!! json_encode($matchGames) !!},
                participants: {!! json_encode($participantData) !!}
            }, {
                selector: '#example',
                theme: 'dark-blue',
                showConnectors: true,
                showSlotsOrigin: true,
                separatedChildCountLabel: true,
            });
        });
    </script>
</div>
