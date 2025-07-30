<?php

namespace App\Filament\Admin\Resources;

use App\Enums\CompetitionType;
use App\Filament\Admin\Resources\CompetitionResource\Pages;
use App\Filament\Admin\Resources\CompetitionResource\RelationManagers;
use App\Models\Competition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('name')
                        ->live('true')
                        ->maxLength(255)
                        ->afterStateUpdated(function (string $state, callable $set) {
                            $set('slug', str($state)->slug());
                        })
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique('competitions', 'slug', ignoreRecord: true)
                        ->maxLength(255),
                    Forms\Components\Select::make('type')
                        ->options(CompetitionType::class)
                        ->required(),
                    Forms\Components\Select::make('competition_category_id')
                        ->relationship('category', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('prize')
                        ->numeric()
                        ->prefix('OMR')
                        ->required(),
                    Forms\Components\Select::make('game_id')
                        ->relationship('game', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('location')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('number_of_players')
                        ->numeric(),
                    Forms\Components\TextInput::make('number_of_winners')
                        ->numeric(),
                ])->columns(2)->columnSpanFull(),

                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('cover_image')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('start_date')->native(false),
                Forms\Components\DateTimePicker::make('end_date')->native(false),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->sortable()
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MatchesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}
