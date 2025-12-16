<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

// spatie perms yes - stem
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function highestRole()
    {
        return $this->roles
            ->sortByDesc(fn ($role) => config('roles')[$role->name] ?? 0)
            ->first();
    }

    public function roleLevel(): int
    {
        return config('roles')[$this->highestRole()?->name] ?? 0;
    }

    public function listRoles(): string
    {
        $roles = $this->roles->pluck('name')->toArray();
        $mainRole = $this->roles
            ->sortByDesc(fn($role) => config('roles')[$role->name] ?? 0)
            ->first()?->name;

        $list = [];
        if ($mainRole) {
            $list[] = $mainRole;
        }

        if (in_array('premium', $roles) && $mainRole !== 'premium') {
            $list[] = 'premium';
        }

        return implode(', ', $list);
    }

}
