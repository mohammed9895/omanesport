<?php

namespace App\Filament\Club\Pages;

use App\Models\Club;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class MyClub extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'hugeicons-game-controller-02';

    protected static string $view = 'filament.club.pages.my-club';

    use InteractsWithForms;

    public ?array $data = [];

    public Club $club;

    public function mount()
    {
        $this->club = Club::where('user_id', auth()->id())->first();
        $this->form->fill($this->club->toArray());
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Basic Information')->schema([
                       Group::make([
                           TextInput::make('name')
                               ->label('Club Name')
                               ->live()
                               ->required()
                               ->afterStateUpdated(function (string $state, callable $set) {
                                   $set('username', str($state)->slug());
                               })
                               ->maxLength(255),
                        TextInput::make('username')
                            ->label('Club Username')
                            ->required()
                            ->unique(column: 'username', ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix(env('APP_URL') . '/club/'),
                       ])->columns(2),
                        RichEditor::make('description')
                            ->label('Club Description')
                            ->required()
                            ->maxLength(5000)
                            ->columnSpanFull(),
                        FileUpload::make('logo')
                            ->label('Club Logo')
                            ->image()
                            ->maxSize(1024)
                            ->directory('clubs/logos'),
                        DatePicker::make('founded_year')
                            ->label('Founded Year')
                            ->native(false)
                            ->required(),
                        Select::make('games')
                            ->relationship('games', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->label('Games')
                            ->required(),
                    ]),
                    Wizard\Step::make('Contact Information')->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        TextInput::make('address')
                            ->label('Address')
                            ->maxLength(500),
                        TextInput::make('website')
                            ->prefixIcon('heroicon-o-globe-alt')
                            ->label('Website')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('youtube')
                            ->prefixIcon('fab-youtube')
                            ->label('YouTube Channel')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('instagram')
                            ->prefixIcon('fab-instagram')
                            ->label('Instagram Profile')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('twitch')
                            ->prefixIcon('fab-twitch')
                            ->label('Twitch Channel')
                            ->url()
                            ->maxLength(255),
                    ]),
                ])->skippable()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                BLADE))),
            ])
            ->statePath('data')
            ->model($this->club);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $user = auth()->user();

        // Create or update the user's club
        $user->club()->updateOrCreate(
            ['user_id' => $user->id], // Match by user ID
            $data // Fillable fields from form
        );

        Notification::make()->title('Club Updated Successfully')
            ->body('Your club information has been updated successfully.')
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->color('success')
            ->send();

    }
}
