<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ParticipantResource\Pages;
use App\Filament\Admin\Resources\ParticipantResource\RelationManagers;
use App\Models\Club;
use App\Models\Game;
use App\Models\Gamer;
use App\Models\Participant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class ParticipantResource extends Resource
{
    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'hugeicons-edit-user-02';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('competition_id')
                    ->relationship('competition', 'name')
                    ->columnSpanFull()
                    ->required(),
               Forms\Components\MorphToSelect::make('participant')
                    ->label('Participant')
                   ->columnSpanFull()
                   ->searchable()
                    ->types([
                        Forms\Components\MorphToSelect\Type::make(Gamer::class)->titleAttribute('name')->searchColumns(['name', 'username'])
                            ->getOptionLabelFromRecordUsing(function (Model $record) {
                                return $record->name . ' (' . $record->username . ')';
                            }),
                        Forms\Components\MorphToSelect\Type::make(Club::class)->titleAttribute('name')->searchColumns(['name', 'username']),
                    ])
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('competition.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participant.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participant')
                    ->label('Participant Type')
                    ->badge()
                    ->formatStateUsing(fn (Model $record) => class_basename($record->participant_type))
                    ->searchable(),
                Tables\Columns\TextColumn::make('participant.club')
                    ->label('Club Name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\Action::make('view')
                    ->label('View Details')
                    ->color('success')
                    ->url(fn (Participant $record): string => class_basename($record->participant_type) == 'Gamer' ? route('gamer.show', ['gamer' => $record->participant]) : route('clubs.show', ['club' => $record->participant]))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParticipants::route('/'),
            'create' => Pages\CreateParticipant::route('/create'),
            'edit' => Pages\EditParticipant::route('/{record}/edit'),
        ];
    }
}
