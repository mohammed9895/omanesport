<?php

namespace App\Filament\Gamer\Pages;

use App\Enums\ClubStatus;
use App\Enums\MemberStatus;
use App\Models\Club;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class Clubs extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.gamer.pages.clubs';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                \App\Models\Club::query()
                    ->where('status', ClubStatus::Approved)
            )
            ->columns([
                Stack::make([
                    ImageColumn::make('logo')
                        ->height('100%')
                        ->width('100%'),
                    Stack::make([
                        TextColumn::make('name')
                            ->weight(FontWeight::Bold),
//                        TextColumn::make('username')
//                            ->formatStateUsing(fn (string $state): string => str($state)->after('://')->ltrim('www.')->trim('/'))
//                            ->color('gray')
//                            ->limit(30),
                    ]),
                ])->space(3),
            ])
            ->actions([
                Action::make('visit')
                    ->label('Visit link')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn (Club $record): string =>  env('APP_URL') . '/clubs/' . urlencode($record->username)),
            ])
            ->filters([
                SelectFilter::make('games')
                    ->label('Games')
                    ->preload()
                    ->multiple()
                    ->relationship('games', 'name'),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->paginated([
                18,
                36,
                72,
                'all',
            ]);
    }
}
