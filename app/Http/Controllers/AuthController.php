<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class AuthController extends Controller
{
    use LivewireAlert;

    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();

        $this->flash('success', 'Email verified! 🎉', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'text' => '',
            'width' => '',
        ]);

        return redirect('/dashboard');
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        $this->flash('success','Logged out. See you soon! 👋', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'text' => '',
            'width' => '',
        ]);

        return redirect()->to('/login');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        $user = User::where('email', $request->email)->first();

        DiscordAlert::to('password_reset')->message("", [
            [
                'title' => 'Password reset',
                'description' => 'User ' . $user->username . ' has reset their password.',
                'color' => '#5F40E5',
                'footer' => [
                    'name' => 'owned.wtf'
                ]
            ]
        ]);

        $this->flash(
            $status === Password::PASSWORD_RESET ? 'success' : 'error',
            __($status),
            [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
                'width' => '',
            ]
        );

        return redirect()->route('login');
    }
}