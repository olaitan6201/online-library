<?php

namespace App\Filament\Reader\Pages;

use Filament\Forms;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;

class Profile extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.reader.pages.profile';
    protected static ?string $navigationLabel = 'My Profile';
    protected static ?int $navigationSort = -2;

    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Auth::user()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile Information')
                    ->description('Update your account profile information')
                    ->schema([
                        FileUpload::make('profile_photo')
                            ->label('Profile Photo')
                            ->image()
                            ->avatar()
                            ->directory('profile-photos')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->columnSpanFull()
                            ->alignCenter(),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ])
                    ->columns(2),

                Section::make('Update Password')
                    ->description('Change your password')
                    ->schema([
                        Forms\Components\TextInput::make('current_password')
                            ->password()
                            ->requiredWith('password')
                            ->currentPassword()
                            ->revealable(),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->requiredWith('current_password')
                            ->rule(Password::default())
                            ->same('password_confirmation')
                            ->revealable(),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->requiredWith('password')
                            ->revealable(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data')
            ->model(Auth::user());
    }

    public function save(): void
    {
        /** @var User $user */
        $user = Auth::user();
        $data = $this->form->getState();

        // Only update password if it was provided
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully!')
            ->success()
            ->send();
    }
}
