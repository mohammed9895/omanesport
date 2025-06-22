<?php

namespace App\Filament\Gamer\Pages;

use App\Enums\MemberStatus;
use App\Models\Gamer;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Invitations extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.gamer.pages.invitations';

    public static function getNavigationBadge(): ?string
    {
        $count = \App\Models\Member::query()
            ->where('gamer_id', auth()->user()->gamer->id)
            ->where('status', MemberStatus::Waiting)
            ->count();
        return $count;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Member::query()
                    ->where('gamer_id', auth()->user()->gamer->id)
            )
            ->columns([
                TextColumn::make('club.name')
                    ->label('Member Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('role')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->badge(),
                TextColumn::make('created_at')
            ])->actions([
                Action::make('Accept')
                    ->label('Accept')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(function (\App\Models\Member $member): void {
                        $member->status = MemberStatus::Accepted;
                        $member->save();
                        Notification::make()
                            ->title('Invitation Accepted')
                            ->success()
                            ->send();
                    }),
                Action::make('Reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->action(function (\App\Models\Member $member): void {
                        $member->status = MemberStatus::Rejected;
                        $member->save();
                        Notification::make()
                            ->title('Invitation Rejected')
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
