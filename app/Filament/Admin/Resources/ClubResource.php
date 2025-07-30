<?php

namespace App\Filament\Admin\Resources;

use App\Enums\ClubStatus;
use App\Filament\Admin\Resources\ClubResource\Pages;
use App\Filament\Admin\Resources\ClubResource\RelationManagers;
use App\Jobs\SendClubStatusUpdateEmail;
use App\Models\Club;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClubResource extends Resource
{
    protected static ?string $model = Club::class;

    protected static ?string $navigationIcon = 'hugeicons-user-switch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable(['name', 'email'])
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->afterStateUpdated(function (Forms\Set $set, $state) {
                        $set('username', str($state)->slug());
                    })
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('logo')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('username')
                    ->unique('clubs', 'username', ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('founded_year')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitch')
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Club Information')
                ->schema([
                    ImageEntry::make('logo')
                        ->label('Club Logo')
                        ->columnSpanFull(),
                    TextEntry::make('user.name')
                        ->label('Club Owner')
                    ->url(fn (Club $record): string => route('filament.admin.resources.users.edit', ['record' => $record->user_id]))
                        ->openUrlInNewTab(),
                    TextEntry::make('username')
                        ->url(fn (Club $record): string => route('clubs.show', ['club' => $record->username]))
                        ->label('Club Username'),
                    TextEntry::make('founded_year')
                        ->label('Founded Year'),
                    TextEntry::make('email')
                        ->icon('heroicon-o-envelope')
                        ->url(fn($state) => 'mailto:' . $state)
                        ->label('Email'),
                    TextEntry::make('phone')
                        ->icon('heroicon-o-phone')
                        ->url(fn($state) => 'tel:' . $state)
                        ->label('Phone'),
                    TextEntry::make('website')
                        ->icon('heroicon-o-globe-alt')
                        ->url(fn($state) => $state ? (str_starts_with($state, 'http') ? $state : 'https://' . $state) : null)
                        ->label('Website'),
                    TextEntry::make('address')
                        ->label('Address'),
                    TextEntry::make('youtube')
                        ->icon('fab-youtube')
                        ->url(fn($state) => $state ? (str_starts_with($state, 'http') ? $state : 'https://' . $state) : null)
                        ->label('YouTube Channel'),
                    TextEntry::make('instagram')
                        ->icon('fab-instagram')
                        ->url(fn($state) => $state ? (str_starts_with($state, 'http') ? $state : 'https://' . $state) : null)
                        ->label('Instagram Handle'),
                    TextEntry::make('twitch')
                        ->icon('fab-twitch')
                        ->url(fn($state) => $state ? (str_starts_with($state, 'http') ? $state : 'https://' . $state) : null)
                        ->label('Twitch Channel'),
                    TextEntry::make('status')
                        ->label('Status')
                        ->badge(),
                ])->columns(2),
        ]); // TODO: Change the autogenerated stub
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('founded_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('twitch')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approve-club')
                    ->label('Approve Club')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->action(function (Club $record) {
                        $record->update(['status' => ClubStatus::Approved]);
                        // Dispatch a job to send email notification
                         dispatch(new SendClubStatusUpdateEmail($record->user, $record));
                        Notification::make()
                            ->title('Club Approved')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation(),
                Tables\Actions\Action::make('reject-club')
                ->label('Reject Club')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                ->action(function (Club $record) {
                    $record->update(['status' => ClubStatus::Rejected]);
                    // Dispatch a job to send email notification
                    dispatch(new SendClubStatusUpdateEmail($record->user, $record));
                    Notification::make()
                        ->title('Club Rejected')
                        ->success()
                        ->send();
                })->requiresConfirmation(),
//                Tables\Actions\Action::make('view-club')
//                    ->label('View Club')
//                    ->url(fn (Club $record): string => route('clubs.show', ['club' => $record->username]))
//                    ->openUrlInNewTab()
//                    ->icon('heroicon-o-eye')
//                    ->openUrlInNewTab(),
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
            'index' => Pages\ListClubs::route('/'),
            'create' => Pages\CreateClub::route('/create'),
            'edit' => Pages\EditClub::route('/{record}/edit'),
            'view' => Pages\ViewClub::route('/{record}'),
        ];
    }
}
