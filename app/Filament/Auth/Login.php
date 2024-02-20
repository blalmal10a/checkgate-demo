<?php

namespace App\Filament\Auth;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Login as BaseAuth;

class Login extends BaseAuth
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // $this->getEmailFormComponent(),
                $this->getLoginFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    //     public function form(Form $form): \Illuminate\View\View
    // {
    //     // Prepare the data you want to pass to the view
    //     $data = [
    //         'loginComponent' => $this->getLoginFormComponent(),
    //         'passwordComponent' => $this->getPasswordFormComponent(),
    //         'rememberComponent' => $this->getRememberFormComponent(),
    //         // Add any other data needed by the view here
    //     ];

    //     // Return the view with the data
    //     return view('your.blade.template', $data);
    // }

    //     <!-- resources/views/your/blade/template.blade.php -->

    // <form method="POST" action="/submit-path">
    //     <!-- Login component -->
    //     {{ $loginComponent }}

    //     <!-- Password component -->
    //     {{ $passwordComponent }}

    //     <!-- Remember component -->
    //     {{ $rememberComponent }}

    //     <button type="submit">Submit</button>
    // </form>


    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
            ->label('Login')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            $login_type => $data['login'],
            'password'  => $data['password'],
        ];
    }

    public function mount(): void
    {
        if (env('APP_ENV') === 'local') {
            // fill method is from HasForms interface
            $this->form->fill([
                'login' => 'agent@example.email',
                'password' => 'agent@example.email',
            ]);
        } else {
            $this->form->fill();
        }
    }
}
