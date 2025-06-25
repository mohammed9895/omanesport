<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CompetitionCategoryResource\Pages;
use App\Filament\Admin\Resources\CompetitionCategoryResource\RelationManagers;
use App\Models\CompetitionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetitionCategoryResource extends Resource
{
    protected static ?string $model = CompetitionCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->afterStateUpdated(function (string $state, callable $set) {
                        $set('slug', str($state)->slug());
                    })
                    ->live()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->maxLength(255)->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()->columnSpanFull(),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListCompetitionCategories::route('/'),
            'create' => Pages\CreateCompetitionCategory::route('/create'),
            'edit' => Pages\EditCompetitionCategory::route('/{record}/edit'),
        ];
    }
}
