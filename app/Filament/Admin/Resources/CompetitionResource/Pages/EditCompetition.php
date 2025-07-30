<?php

namespace App\Filament\Admin\Resources\CompetitionResource\Pages;

use App\Enums\CompetitionType;
use App\Filament\Admin\Resources\CompetitionResource;
use App\Services\CompetitionBracketService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCompetition extends EditRecord
{
    protected static string $resource = CompetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('generateBrackets')
                ->label('Generate Brackets')
                ->action('generateBrackets')
                ->icon('heroicon-c-beaker')
                ->color('primary')
                ->requiresConfirmation(),
        ];
    }

    public function generateBrackets()
    {
        $competition = $this->record;
        $service = new CompetitionBracketService();
    // check if competition has participants
        if ($competition->participants->isEmpty()) {
            Notification::make()
                ->title('No participants found')
                ->body('Please add participants before generating brackets.')
                ->danger()
                ->send();
            return;
        }

        // Check if matches already exist
        if ($competition->matches()->exists()) {
            Notification::make()
                ->title('Brackets already generated')
                ->body('Matches already exist for this competition.')
                ->warning()
                ->send();
            return;
        }
        if ($competition->type === CompetitionType::Knockout) {
            $participants = $competition->participants;
            $service->generateKnockoutMatches($competition, $participants);
        } elseif ($competition->type === CompetitionType::League) {
            $participants = $competition->participants;

            // 1. Auto-split into groups if none
            if ($competition->groups()->count() === 0) {
                $chunks = $participants->shuffle()->chunk(4);
                $groupNames = range('A', 'Z');

                foreach ($chunks as $index => $groupGamers) {
                    $group = $competition->groups()->create([
                        'name' => 'Group ' . $groupNames[$index],
                    ]);

                    foreach ($groupGamers as $gamer) {
                        $gamer->competitionGroups()->attach($group);
                    }
                }

                $competition->refresh(); // Reload groups
            }

            // 2. Generate league matches (round robin)
            foreach ($competition->groups as $group) {
                $groupParticipants = $group->participants;
                $service->generateLeagueMatches($group, $groupParticipants);
            }

            // 3. If league already played: generate knockout
            $service->generateKnockoutBracketFromLeagueStructure($competition);
        }

        Notification::make()->title('Brackets generated!')->success()->send();
    }
}
