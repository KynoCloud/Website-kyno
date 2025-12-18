<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutBannedUser
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->isBanned()) {
            // Get the latest ban
            $userBan = $user->bans()->latest()->first();

            // Store alert info in session
            $request->session()->flash('banned', [
                'title' => 'You have been banned!',
                'message' => $userBan->reason ?? 'No reason provided',
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');
        }

        return $next($request);
    }
}