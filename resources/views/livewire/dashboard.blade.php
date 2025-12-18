<div>
    <h1>
        Welcome to your dashboard!<br>
        Username: {{ Auth::user()->name }}<br>
        Rank: {{ Auth::user()->topRole() ?? 'No rank' }}
    </h1>

    <button wire:click="logout">Logout</button>
</div>