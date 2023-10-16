<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class EditProfile extends Page
{
    protected static ?string $model = User::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'fas-user';

    protected static string $view = 'filament.pages.edit-profile';
    

    // public $user;

    // public function mount()
    // {
    //     $this->user = auth()->user();
    // }

    protected function getViewData(): array
    {

        $user = auth()->user(); // get the authenticated user
        return compact('user');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
