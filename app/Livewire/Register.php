<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Register extends Component
{
    public $username;
    public $email;
    public $confirmEmail;
    public $password;
    public $tos = false;

    protected function rules()
    {
        $blacklist = [
            // system / admin
            'admin','administrator','root','system','sys','owner','moderator','mod',
            'staff','support','help','security','dev','developer','operator',
            'console','api','bot','service',

            // routes / app
            'login','logout','register','signup','signin','dashboard','home','index',
            'settings','profile','account','billing','payments','invoice','auth',
            'oauth','verify','verification','admindashboard', 'developerdashboard', 'config',
            'manage', 'manageusers', 'users', 'status', 'statuspage', 'apiinfo', 'apidocs',
            'documentation', 'docs', 'helpdesk', 'contact', 'supportdesk',

            // reserved / internal
            'null','undefined','true','false','test','testing','demo','example',
            'sample','default','guest','anonymous','unknown','me','you','user','users','operator',
            'member','members','staff','team','staffmember','staffmembers',

            // cringe / troll
            'fuck','shit','bitch','asshole','dick','pussy','nigger','nigga',
            'faggot','retard','cunt','whore','slut','porn','sex','xxx',

            // hacker / impersonation
            'hacker','h4x0r','elite','leet','1337','god','allah','jesus',
            'satan','lucifer','devil','hitler','nazi','isis','764','077','nazi',
        ];

        return [
            'username' => [
                'required',
                'string',
                'min:3',
                'max:24',
                'regex:/^[a-zA-Z0-9._-]+$/',
                Rule::notIn($blacklist),
                'unique:users,name',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                function ($attribute, $value, $fail) use ($blacklist) {
                    $localPart = strtolower(strtok($value, '@')); // before @

                    if (in_array($localPart, $blacklist)) {
                        $fail('That email looks suspicious 👀');
                    }
                },
            ],
            'confirmEmail' => 'required|same:email',
            'password' => 'required|min:8|max:255',
            'tos' => 'required|accepted',
        ];
    }

    protected $messages = [
        'username.regex' => 'Username can only contain letters, numbers, dots, dashes, and underscores.',
        'username.not_in' => 'Hey, those names are restricted. 😡',
        'username.unique' => 'That username is already taken.',
    ];

    public function authenticate()
    {
        $this->validate();

        $user = User::create([
            'name' => strtolower($this->username), // normalize 👀
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $user->assignRole('user');

        Auth::login($user);

        LivewireAlert::title('Welcome 👋')
            ->text('Account created successfully')
            ->success()
            ->show();

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}