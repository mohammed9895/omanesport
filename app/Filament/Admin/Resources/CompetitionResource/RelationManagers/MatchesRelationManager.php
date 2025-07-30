<?php

namespace App\Filament\Admin\Resources\CompetitionResource\RelationManagers;

use App\Enums\CompetitionType;
use App\Models\CompetitionGroup;
use App\Models\CompetitionMatch;
use App\Models\Gamer;
use App\Services\CompetitionBracketService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatchesRelationManager extends RelationManager
{
    protected static string $relationship = 'matches';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Select::make('home_id')
                        ->relationship('home', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('home_score')
                        ->numeric()
                        ->default(0)
                        ->required(),
                    Forms\Components\Select::make('away_id')
                        ->relationship('away', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('away_score')
                        ->numeric()
                        ->default(0)
                        ->required(),
                    Forms\Components\Select::make('round_name')
                        ->options([
                            'Final' => 'Final',
                            'Semi Final' => 'Semi Final',
                            'Quarter Final' => 'Quarter Final',
                            'Round of 16' => 'Round of 16',
                            'Round of 32' => 'Round of 32',
                            'Round of 64' => 'Round of 64',
                            'Round of 128' => 'Round of 128',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('round')
                        ->numeric()
                        ->default(1)
                        ->required(),
                    Forms\Components\Select::make('winner_id')
                        ->relationship('winner', 'name')
                        ->searchable()
                        ->preload(),
                ])->columnSpanFull()->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('home_id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Match ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Competition.name')
                    ->sortable()
                    ->searchable(),
//                Tables\Columns\TextColumn::make('home_id')
//                    ->label('Home Gamer')
//                    ->formatStateUsing(function ($state, $record) {
//                        if (!empty($state)) {
//                            return Gamer::find($state)?->name ?? 'TBD';
//                        }
//
//                        dd('Home gamer not set for match ID: ' . $record->id);
//
//                        // Parse placeholder like "1st Group A"
//                        if (! $record?->placeholder_home) return 'TBD';
//
//                        if (! preg_match('/(\d+)(?:st|nd|rd|th) Group ([A-Z])/', $record->placeholder_home, $matches)) {
//                            return $record->placeholder_home;
//                        }
//
//                        $position = (int) $matches[1]; // e.g., 1
//                        $groupName = $matches[2];      // e.g., "A"
//
//                        $group = CompetitionGroup::where('competition_id', $record->competition_id)
//                            ->where('name', $groupName)
//                            ->first();
//
//                        if (! $group) return 'TBD';
//
//                        // Get participants (Gamer models)
//                        $gamers = $group->participants;
//
//                        // Rank them by points
//                        $ranked = $gamers->sortByDesc(function ($gamer) use ($group) {
//                            $matches = CompetitionMatch::where('group_id', $group->id)
//                                ->where(function ($q) use ($gamer) {
//                                    $q->where('home_id', $gamer->id)
//                                        ->orWhere('away_id', $gamer->id);
//                                })
//                                ->get();
//
//                            $points = 0;
//
//                            foreach ($matches as $match) {
//                                if (! $match->winner_id) continue;
//
//                                if ($match->winner_id === $gamer->id) {
//                                    $points += 3;
//                                } elseif (
//                                    $match->home_score !== null &&
//                                    $match->away_score !== null &&
//                                    $match->home_score == $match->away_score
//                                ) {
//                                    $points += 1;
//                                }
//                            }
//
//                            return $points;
//                        })->values();
//
//                        return $ranked[$position - 1]?->name ?? 'TBD';
//                    }),
                Tables\Columns\TextColumn::make('home_gamer')
                    ->label('Home Gamer')
                    ->getStateUsing(function ($record) {
                        if (!empty($record->home_id)) {
                            return \App\Models\Gamer::find($record->home_id)?->name ?? 'TBD';
                        }

                        $placeholder = $record->placeholder_home;
                        if (empty($placeholder)) return 'TBD';

                        // ✅ Handle "Winner of Match #..."
                        if (preg_match('/Winner of Match\s+#(\d+)/i', $placeholder, $matchRef)) {
                            $matchId = (int) $matchRef[1];
                            $match = \App\Models\CompetitionMatch::find($matchId);

                            if ($match && $match->winner_id) {
                                return \App\Models\Gamer::find($match->winner_id)?->name ?? $placeholder;
                            }

                            return $placeholder;
                        }

                        // ✅ Handle "1st Group A"
                        $cleaned = str_replace('Group Group', 'Group', $placeholder);
                        if (!preg_match('/(\d+)(?:st|nd|rd|th)\s+Group\s+([A-Z])/i', $cleaned, $matches)) {
                            return $placeholder;
                        }

                        $position = (int) $matches[1];
                        $groupName = $matches[2];

                        $group = \App\Models\CompetitionGroup::where('competition_id', $record->competition_id)
                            ->where('name', 'Group ' . $groupName)
                            ->first();

                        if (! $group) return $placeholder;

                        $gamers = $group->participants;

                        $ranked = $gamers->sortByDesc(function ($gamer) use ($group) {
                            $matches = \App\Models\CompetitionMatch::where('group_id', $group->id)
                                ->where(function ($q) use ($gamer) {
                                    $q->where('home_id', $gamer->id)
                                        ->orWhere('away_id', $gamer->id);
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

                        return $ranked[$position - 1]?->name ?? $placeholder;
                    }),
                Tables\Columns\TextColumn::make('placeholder_home')
                    ->label('Home Placeholder'),
                Tables\Columns\TextInputColumn::make('home_score')
                    ->label('Home Score')
                    ->toggleable(true)
                    ->sortable()
                    ->searchable(),
//                Tables\Columns\TextColumn::make('away_id')
//                    ->label('Away Gamer')
//                    ->formatStateUsing(fn ($state) => Gamer::find($state)?->name ?? 'TBD'),
                Tables\Columns\TextColumn::make('away_gamer')
                    ->label('Away Gamer')
                    ->getStateUsing(function ($record) {
                        if (!empty($record->away_id)) {
                            return \App\Models\Gamer::find($record->away_id)?->name ?? 'TBD';
                        }

                        $placeholder = $record->placeholder_away;
                        if (empty($placeholder)) return 'TBD';

                        // ✅ Handle "Winner of Match #..."
                        if (preg_match('/Winner of Match\s+#(\d+)/i', $placeholder, $matchRef)) {
                            $matchId = (int) $matchRef[1];
                            $match = \App\Models\CompetitionMatch::find($matchId);

                            if ($match && $match->winner_id) {
                                return \App\Models\Gamer::find($match->winner_id)?->name ?? $placeholder;
                            }

                            return $placeholder;
                        }

                        // ✅ Handle "1st Group B"
                        $cleaned = str_replace('Group Group', 'Group', $placeholder);
                        if (!preg_match('/(\d+)(?:st|nd|rd|th)\s+Group\s+([A-Z])/i', $cleaned, $matches)) {
                            return $placeholder;
                        }

                        $position = (int) $matches[1];
                        $groupName = $matches[2];

                        $group = \App\Models\CompetitionGroup::where('competition_id', $record->competition_id)
                            ->where('name', 'Group ' . $groupName)
                            ->first();

                        if (! $group) return $placeholder;

                        $gamers = $group->participants;

                        $ranked = $gamers->sortByDesc(function ($gamer) use ($group) {
                            $matches = \App\Models\CompetitionMatch::where('group_id', $group->id)
                                ->where(function ($q) use ($gamer) {
                                    $q->where('home_id', $gamer->id)
                                        ->orWhere('away_id', $gamer->id);
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

                        return $ranked[$position - 1]?->name ?? $placeholder;
                    }),
                Tables\Columns\TextColumn::make('placeholder_away')
                    ->label('Away Placeholder'),
                Tables\Columns\TextInputColumn::make('away_score')
                    ->label('Away Score')
                    ->toggleable(true)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('round_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->label('Group')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('winner_id')
                    ->hidden(function ($record) {
                    if (! $record || ! $record->winner_id) {
                        return true;
                    }
                    return false;
                })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\SelectColumn::make('winner_id')
                    ->label('Winner')
                    ->options(function ($record) {
                        $ids = [];

                        // ✅ Add direct home/away gamer IDs if assigned
                        if (!empty($record->home_id)) {
                            $ids[] = $record->home_id;
                        }

                        if (!empty($record->away_id)) {
                            $ids[] = $record->away_id;
                        }

                        // ✅ If placeholders are set and IDs are not
                        foreach (['placeholder_home', 'placeholder_away'] as $field) {
                            if (!empty($record->{$field})) {
                                $placeholder = str_replace('Group Group', 'Group', $record->{$field});

                                // Case 1: Winner of Match #
                                if (preg_match('/Winner of Match\s+#(\d+)/i', $placeholder, $matchRef)) {
                                    $matchId = (int) $matchRef[1];
                                    $match = \App\Models\CompetitionMatch::find($matchId);
                                    if ($match && $match->winner_id) {
                                        $ids[] = $match->winner_id;
                                    }
                                }

                                // Case 2: 1st Group A
                                elseif (preg_match('/(\d+)(?:st|nd|rd|th)\s+Group\s+([A-Z])/i', $placeholder, $matches)) {
                                    $position = (int) $matches[1];
                                    $groupName = $matches[2];

                                    $group = \App\Models\CompetitionGroup::where('competition_id', $record->competition_id)
                                        ->where('name', 'Group ' . $groupName)
                                        ->first();

                                    if ($group) {
                                        $gamers = $group->participants;

                                        $ranked = $gamers->sortByDesc(function ($gamer) use ($group) {
                                            $matches = \App\Models\CompetitionMatch::where('group_id', $group->id)
                                                ->where(function ($q) use ($gamer) {
                                                    $q->where('home_id', $gamer->id)
                                                        ->orWhere('away_id', $gamer->id);
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

                                        $resolved = $ranked[$position - 1] ?? null;
                                        if ($resolved) {
                                            $ids[] = $resolved->id;
                                        }
                                    }
                                }
                            }
                        }

                        return \App\Models\Gamer::whereIn('id', array_unique($ids))
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('round_name')
                    ->options([
                        'Final' => 'Final',
                        'Semi Final' => 'Semi Final',
                        'Quarter Final' => 'Quarter Final',
                        'Round of 16' => 'Round of 16',
                        'Round of 32' => 'Round of 32',
                        'Round of 64' => 'Round of 64',
                        'Round of 128' => 'Round of 128',
                    ]),
                Tables\Filters\SelectFilter::make('group_id')
                    ->relationship('group', 'name', function (Builder $query) {
                        $query->where('competition_id', $this->getOwnerRecord()->id);
                    })
                    ->label('Group'),

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\Action::make('update_winners')
                    ->label('Update Winners')
                    ->icon('heroicon-o-trophy')
                    ->action(function (array $data) {
                        app(CompetitionBracketService::class)->resolveKnockoutMatchParticipants($this->getOwnerRecord());
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public function getTabs(): array
    {
        if ($this->getOwnerRecord()->type == CompetitionType::Knockout) {
            return [];
        }
        else {
            return [
                null => Tab::make('All Matches')
                    ->icon('heroicon-o-rectangle-stack'),
                'group' => Tab::make('Group Matches')->query(
                    fn (Builder $query) => $query->whereNotNull('group_id')
                )->icon('heroicon-o-users'),
                'knockout' => Tab::make('Knockout Matches')->query(
                    fn (Builder $query) => $query->whereNull('group_id')
                )->icon('heroicon-o-trophy'),
            ];
        }
    }
}
