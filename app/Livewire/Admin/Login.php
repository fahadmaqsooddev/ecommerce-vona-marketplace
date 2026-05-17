<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    public $email = '';
    public $password = '';
    public $errorMessage = ''; // For displaying invalid login
    public function render()
    {
        return view('livewire.admin.login');
    }
    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard'); 
        }

        $this->errorMessage = 'Invalid Email or Password';
    }
}
