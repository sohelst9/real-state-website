<div class="col-lg-4 col-12 mb-sm-50 mb-xs-50">
    <ul class="myaccount-tab-list nav">
        <li><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i
                    class="fa-regular fa-user"></i>My Profile</a></li>
        @if (auth()->user()->type == 2)
            <li><a class="{{ request()->routeIs('agent.property') ? 'active' : '' }}"
                    href="{{ route('agent.property') }}"><i class="fa-solid fa-house"></i>My Properties</a></li>

            <li><a class="{{ request()->routeIs('agent.add.property') ? 'active' : '' }}"
                    href="{{ route('agent.add.property') }}"><i class="fa-solid fa-house-medical-flag"></i>Add New
                    Property</a></li>
        @endif

        <li><a class="{{ request()->routeIs('agent.password') ? 'active' : '' }}" href="{{ route('agent.password') }}"><i
                    class="fa-solid fa-key"></i>Change Password</a></li>

        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="user-toggle"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>
