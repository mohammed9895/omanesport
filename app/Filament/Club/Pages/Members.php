<?php

namespace App\Filament\Club\Pages;

use App\Models\Gamer;
use App\Models\Member;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Members extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.club.pages.members';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Member::query()
                    ->where('club_id', auth()->user()->club->id)
            )
            ->headerActions([
                Action::make('inviteMember')
                    ->form([
                        Select::make('gamerId')
                            ->searchable()
                            ->label('Gamer')
                            ->options(Gamer::query()->pluck('name', 'id'))
                            ->required(),
                        Select::make('role')->options([
                            'admin' => 'Admin',
                            'member' => 'Member',
                        ])->default('member')->label('Role')
                    ])
                    ->action(function (array $data): void {
                        // create a new member with the selected gamer
                        $member = new \App\Models\Member();
                        $member->gamer_id = $data['gamerId'];
                        $member->club_id = auth()->user()->club->id;
                        $member->role = $data['role'];
                        $member->save();
                    })
            ])
            ->columns([
               TextColumn::make('gamer.name')
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
        ]);
    }
}
