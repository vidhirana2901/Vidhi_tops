<nav>
    <a href="/home">Home</a> | 
    <a href="/profile">Profile</a> | 
    <a href="/orders">Orders</a>
    @auth
        |
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit">Log out</button>
        </form>
    @endauth
</nav>
<hr>