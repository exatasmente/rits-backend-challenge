<?php
namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Validators\AdminLoginValidator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email = 'rits@backend.dev';
    public $password = 'secret';

    final public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    final public function messages()
    {
        return [
            'email.required' => 'O Email é obrigatório',
            'name.required' => 'O Nomé é obrigatório',
            'email.email'  => 'O campo precisa ser um Email',
            'password.required' => 'A Senha é obrigatória',
        ];
    }

    public function authenticate()
    {
        $credentials = $this->validate(
            $this->rules(),
            $this->messages()
        );

        if (!Auth::attempt($credentials)) {
            session()->flash('error', 'Credênciais inválidas');
            return;
        }
        redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
