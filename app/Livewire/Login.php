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
            'email' => 'required|email',
            'password' => 'required|max:255',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            LivewireAlert::title('Error')
                ->text('The email or password is invalid ')
                ->error()
                ->show();
            return;
        }

        // Check if banned
        if ($user->isBanned()) {
            $ban = $user->bans()->whereNull('deleted_at') // ignore soft-deleted
                                ->where(function($q) {
                                    $q->whereNull('expired_at')
                                    ->orWhere('expired_at', '>', now());
                                })
                                ->latest()
                                ->first();
            $reason = $ban?->comment;

            $duration = $ban && $ban->isPermanent()
                ? 'Permanent'
                : 'Until ' . $ban->expired_at->format('Y-m-d H:i');

            $message = "You are banned from the platform.<br>";
            if ($reason) {
                $message .= "Reason: {$reason}.<br>";
            }
            $message .= "Duration: {$duration}.";

            LivewireAlert::title('Banned ❌')
                ->text($message)
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
                ->text('The email or password is invalid')
                ->error()
                ->show();
            return;
        }

        session()->regenerate();

        LivewireAlert::title('Success')
            ->text('Welcome back, ' . $user->name . '!')
            ->success()
            ->show();

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
