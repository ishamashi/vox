<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="https://github.com/ishamashi">ISHAMASHI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ ($title == "HOME") ? 'active' : '' }}" aria-current="page" href="/dashboard">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title == "ORGANIZER") ? 'active' : '' }}" href="/organizer">Organizer</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title == "SPORT EVENT") ? 'active' : '' }}" href="/sport-events">Sport Event</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ($title == "USER") ? 'active' : '' }}" href="/user">User</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @if (session()->has('tokenApi'))
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link {{ ($title == "HOME") ? 'active' : '' }}" aria-current="page" ><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ ($title == "HOME") ? 'active' : '' }}" aria-current="page" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            </li>
            @endif
        </ul>
        </div>
    </div>
</nav>