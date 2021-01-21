<style>
    .active {
        background-color: blue;
        color: white;
    }
</style>

<li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
    <a href="{{ url('/dashboard') }}" class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item {{ request()->is('stars') ? 'active' : ''}}">
    <a href="{{ url('stars') }}" class="nav-link">
        <i class="fas fa-list-ul"></i>
        <p>Stars</p>
    </a>
</li>

