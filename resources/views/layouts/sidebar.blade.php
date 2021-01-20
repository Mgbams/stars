<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('stars.main.page') }}" class="brand-link">
        @if(Auth::user())
            @if(Auth::user()->photo !== "avatar1.png")
            <img src="images/users/{{Auth::user()->id}}/{{Auth::user()->photo}}"
                alt="website logo"
                class="brand-image img-circle elevation-3" />
            @else
            <img src="images/avatar/{{Auth::user()->photo}}"
                alt="avatar image"
                class="brand-image img-circle elevation-3" />
            @endif
        @endif
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
