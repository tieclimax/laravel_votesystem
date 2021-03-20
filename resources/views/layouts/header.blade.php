<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Navbar</a>
    <form class="form-inline" action={{ route('logout') }} method="get">
        @csrf
        {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> --}}
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Log out</button>
    </form>
</nav>
