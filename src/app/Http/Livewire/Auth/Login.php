<?php
namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';


    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            $this->addError('email', 'Credênciais inválidas');
            return;
        }

        redirect()->intended(route('api/produ'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
