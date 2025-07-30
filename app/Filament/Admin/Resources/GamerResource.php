<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GamerResource\Pages;
use App\Filament\Admin\Resources\GamerResource\RelationManagers;
use App\Models\Gamer;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GamerResource extends Resource
{
    protected static ?string $model = Gamer::class;

    protected static ?string $navigationIcon = 'hugeicons-game-controller-03';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('bio')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('picture'),
                Forms\Components\TextInput::make('dob')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitch')
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discord')
                    ->maxLength(255),
                Forms\Components\TextInput::make('steam')
                    ->maxLength(255),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Gamer Information')
                ->schema([
                    ImageEntry::make('picture')
                        ->label('Profile Picture'),
                    TextEntry::make('user.name')
                        ->label('User Name'),
                    TextEntry::make('name')
                        ->label('Gamer Name'),
                    TextEntry::make('username')
                        ->label('Username'),
                    TextEntry::make('country')
                        ->label('Country'),
                    TextEntry::make('dob')
                        ->label('Date of Birth'),
                    TextEntry::make('email')
                        ->label('Email Address')
                        ->icon('heroicon-o-envelope')
                        ->url(fn($state) => 'mailto:' . $state),
                    TextEntry::make('phone')
                        ->label('Phone Number')
                        ->icon('heroicon-o-phone')
                        ->url(fn($state) => 'tel:' . $state),
                ])->columns(3)->columnSpanFull(),
            Section::make('Social Media Links')
                ->schema([
                    TextEntry::make('website')
                        ->label('Website')
                        ->icon('heroicon-o-globe-alt')
                        ->url(fn($state) => $state),
                    TextEntry::make('twitch')
                        ->icon('fab-twitch')
                        ->label('Twitch')
                        ->url(fn($state) => $state),
                    TextEntry::make('youtube')
                        ->icon('fab-youtube')
                        ->url(fn($state) => $state)
                        ->label('YouTube'),
                    TextEntry::make('twitter')
                        ->icon('fab-twitter')
                        ->url(fn($state) => $state)
                        ->label('Twitter'),
                    TextEntry::make('facebook')
                        ->icon('fab-facebook')
                        ->url(fn($state) => $state)
                        ->label('Facebook'),
                    TextEntry::make('instagram')
                        ->icon('fab-instagram')
                        ->url(fn($state) => $state)
                        ->label('Instagram'),
                    TextEntry::make('discord')
                        ->icon('fab-discord')
                        ->url(fn($state) => $state)
                        ->label('Discord'),
                    TextEntry::make('steam')
                        ->icon('fab-steam')
                        ->url(fn($state) => $state)
                        ->label('Steam'),
                ])->columns(4),
        ]); // TODO: Change the autogenerated stub
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dob')
                    ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->age : null)
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye')
                    ->label('View')
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
            'index' => Pages\ListGamers::route('/'),
            'create' => Pages\CreateGamer::route('/create'),
            'edit' => Pages\EditGamer::route('/{record}/edit'),
            'view' => Pages\ViewGamer::route('/{record}'),
        ];
    }
}
