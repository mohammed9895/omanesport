<?php

namespace App\Livewire\Club;

use App\Jobs\SendClubWelcomeEmail;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Onboarding extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Wizard::make([
                   Wizard\Step::make('Basic Information')->schema([
                       TextInput::make('name')
                           ->label('Club Name')
                           ->required()
                           ->maxLength(255),
                       RichEditor::make('description')
                           ->label('Club Description')
                           ->required()
                           ->maxLength(5000)
                           ->columnSpanFull(),
                       TextInput::make('username')
                           ->prefix(env('APP_URL') . '/gamer/')
                           ->required()
                           ->unique(column: 'username')
                           ->label('Username'),
                       FileUpload::make('logo')
                           ->label('Club Logo')
                           ->image()
                           ->maxSize(1024)
                           ->directory('clubs/logos')
                           ->visibility('public'),
                       DatePicker::make('founded_year')
                           ->label('Founded Year')
                           ->native(false)
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
               ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                BLADE))),
            ])
            ->statePath('data');
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


        SendClubWelcomeEmail::dispatch($user);

        redirect()->route('filament.club.pages.dashboard'); // Change route as needed
    }

    #[Layout('livewire.components.layouts.onboarding')]
    public function render()
    {
        return view('livewire.club.onboarding');
    }
}
