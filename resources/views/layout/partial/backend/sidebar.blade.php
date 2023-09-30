<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

                <span class="app-brand-text demo menu-text fw-bolder ms-2">Apon Thikana</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if (Auth::guard('admin')->user()->Role?->slug == 'admin')
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- All Property -->
            <li class="menu-item {{ request()->routeIs('admin.property') ? 'active' : '' }}">
                <a href="{{ route('admin.property') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-figma mb-2"></i>
                    <div data-i18n="Basic">Pending Property</div>
                </a>
            </li>
        @endif

        <!----editor----->
        @if (Auth::guard('admin')->user()->Role?->slug == 'editor')
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- about -->
            <li class="menu-item {{ request()->routeIs('admin.about') ? 'active' : '' }}">
                <a href="{{ route('admin.about') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-blogger"></i>
                    <div data-i18n="Basic">About Page</div>
                </a>
            </li>

             <!-- contact -->
             <li class="menu-item {{ request()->routeIs('admin.contact') ? 'active' : '' }}">
                <a href="{{ route('admin.contact') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Contact Message</div>
                </a>
            </li>

            <!-- newsletters -->
            <li class="menu-item {{ request()->routeIs('admin.newsletter') ? 'active' : '' }}">
                <a href="{{ route('admin.newsletter') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Newsletters</div>
                </a>
            </li>

            <!-- setting -->
            <li class="menu-item {{ request()->routeIs('admin.setting') ? 'active' : '' }}">
                <a href="{{ route('admin.setting') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Website Setting</div>
                </a>
            </li>
        @endif

        @if (Auth::guard('admin')->user()->Role?->slug == 'legal' || Auth::guard('admin')->user()->Role?->slug == 'management')
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- All Property -->
            <li class="menu-item {{ request()->routeIs('admin.property') ? 'active' : '' }}">
                <a href="{{ route('admin.property') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-figma mb-2"></i>
                    <div data-i18n="Basic">All Property</div>
                </a>
            </li>
        @else
            @if (Auth::guard('admin')->user()->Role?->slug != 'editor')
                <!-- Agents -->
            <li class="menu-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <a href="{{ route('admin.users') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Basic">Website Agent/User</div>
                </a>
            </li>

            <!--Property -->
            <li
                class="menu-item {{ request()->routeIs('admin.prpoperty_type') ? 'active' : '' }}  {{ request()->routeIs('admin.prpoperty_type') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxl-angular"></i>
                    <div data-i18n="Layouts">Property</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.property.approved') }}" class="menu-link">
                            <div data-i18n="Without menu">Approved Propery</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.property.create') }}" class="menu-link">
                            <div data-i18n="Without menu">Add Propery</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.prpoperty_type') }}" class="menu-link">
                            <div data-i18n="Without menu">Property Type</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- city -->
            <li class="menu-item {{ request()->routeIs('admin.city') ? 'active' : '' }}">
                <a href="{{ route('admin.city') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-500px"></i>
                    <div data-i18n="Basic">City</div>
                </a>
            </li>

            <!-- about -->
            <li class="menu-item {{ request()->routeIs('admin.about') ? 'active' : '' }}">
                <a href="{{ route('admin.about') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-blogger"></i>
                    <div data-i18n="Basic">About Page</div>
                </a>
            </li>

            <!--Administrator -->
            <li
                class="menu-item {{ request()->routeIs('admin.adminuser') || request()->routeIs('admin.adminuser.edit') || request()->routeIs('admin.role') ? 'active' : '' }}  {{ request()->routeIs('admin.adminuser') || request()->routeIs('admin.adminuser.edit') || request()->routeIs('admin.role') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Administrator</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('admin.adminuser') }}" class="menu-link">
                            <div data-i18n="Without menu">User</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.role') }}" class="menu-link">
                            <div data-i18n="Without menu">Role</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- contact -->
            <li class="menu-item {{ request()->routeIs('admin.contact') ? 'active' : '' }}">
                <a href="{{ route('admin.contact') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Contact Message</div>
                </a>
            </li>

            <!-- newsletters -->
            <li class="menu-item {{ request()->routeIs('admin.newsletter') ? 'active' : '' }}">
                <a href="{{ route('admin.newsletter') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Newsletters</div>
                </a>
            </li>

            <!-- setting -->
            <li class="menu-item {{ request()->routeIs('admin.setting') ? 'active' : '' }}">
                <a href="{{ route('admin.setting') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Website Setting</div>
                </a>
            </li>
            @endif
        @endif

    </ul>
</aside>
