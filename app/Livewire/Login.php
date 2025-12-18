<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Login extends Component
{

    public $email;
    public $password;
    public $remember;

    public function authenticate()
    {
        $validated = $this->validate([
            'password' => 'required|max:255',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            LivewireAlert::title('Error')
                ->text('The email or password is invalid 😔')
                ->error()
                ->show();
            return;
        }

        // Check if banned
        if ($user->banned_at) {
            LivewireAlert::title('Banned ❌')
                ->text('You are banned from the platform.' . ($user->ban_reason ? " Reason: {$user->ban_reason}" : ''))
                ->error()
                ->show();
            return;
        }

        // Attempt login
        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $validated['password']
        ], $this->remember ?? false)) {
            LivewireAlert::title('Error')
                ->text('The email or password is invalid 😔')
                ->error()
                ->show();
            return;
        }

        session()->regenerate();

        LivewireAlert::title('Success')
            ->text('Welcome back, ' . $user->name . ' 👋')
            ->success()
            ->show();

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
