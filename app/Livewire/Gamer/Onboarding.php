<?php

namespace App\Livewire\Gamer;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Layout;
use Livewire\Component;
use function Pest\Laravel\options;

class Onboarding extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    private $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");


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
                            ->label('Fullname')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('bio')
                            ->label('Bio')
                            ->required()
                            ->maxLength(5000)
                            ->columnSpanFull(),
                        TextInput::make('username')
                            ->prefix(env('APP_URL') . '/gamer/')
                            ->required()
                            ->unique(column: 'username')
                            ->label('Username'),
                        FileUpload::make('picture')
                            ->label('Picture')
                            ->image()
                            ->maxSize(1024)
                            ->directory('gamers/pictures')
                            ->visibility('public'),
                        DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->native(false)
                            ->required(),
                    ]),
                    Wizard\Step::make('Contact Information')->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->tel()
                            ->maxLength(20),
                        Select::make('country')
                            ->searchable()
                            ->options($this->countries)
                            ->label('Address'),
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
                        TextInput::make('twitter')
                            ->prefixIcon('fab-twitter')
                            ->label('Twitter Profile')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('discord')
                            ->prefixIcon('fab-discord')
                            ->label('Discord Username')
                            ->maxLength(255)
                            ->placeholder('username#1234'),
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
        $user->gamer()->updateOrCreate(
            ['user_id' => $user->id], // Match by user ID
            $data // Fillable fields from form
        );

        // assign the user to the club
        $user->assignRole('gamer');


        redirect()->route('filament.gamer.pages.dashboard'); // Change route as needed
    }

    #[Layout('livewire.components.layouts.onboarding')]
    public function render()
    {
        return view('livewire.gamer.onboarding');
    }
}
