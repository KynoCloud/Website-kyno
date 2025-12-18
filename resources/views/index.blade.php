<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}</title>
        <link rel="icon" href="{{ asset('fav.png') }}" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ asset('assets/css/index/app.css') }}">
        <script src="{{ asset('assets/js/index/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <meta property="og:title" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
        <meta property="og:description" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }} Invite only biolink page. Join our discord: https://discord.gg/kyno">
        <meta property="og:image" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}/fav.png">
        <meta property="og:url" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
        <meta name="theme-color" content="#5e9dfcff">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
        <meta name="twitter:description" content="{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }} Invite only biolink page. Join our discord: https://discord.gg/kyno">
        <meta name="twitter:image" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}/fav.png">
        <meta name="twitter:domain" content="https://{{ $domain ?? 'kynocloud' }}{{ $tld ?? '.com' }}">
        <meta property="og:type" content="Biography">
        <meta property="og:image:width" content="150">
        <meta property="og:image:height" content="150">
        <meta name="twitter:image:width" content="150">
        <meta name="twitter:image:height" content="150">
    </head>
    <body>
        <div class="container">
            <div class="container-items">
                <h1>{{ $domain ?? 'kynocloud' }}<span>{{ $tld ?? '.com' }}</span></h1>
                <p>Your Exclusive Hub for Server and Secure File Hosting</p>
                <a id="discordInvite">
                    <div class="discord-embed">
                        <img id="serverIcon">
                        <div class="text-container">
                            <h1 id="serverName"></h1>
                            <p id="memberData"></p>
                        </div>
                    </div>
                </a>
                <div class="button-container">
                    <a href="{{ route('login') }}" class="button">Login</a>
                    <a href="{{ route('register') }}" class="button">Register</a>
                </div>
            </div>
        </div>
    </body>
</html>