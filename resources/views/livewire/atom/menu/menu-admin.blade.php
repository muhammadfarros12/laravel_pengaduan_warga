<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>


        </li>

        <li class="sidebar-item">
            {{-- <a href="{{ route('laporan') }}" class='sidebar-link'> --}}
            <a href="" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Laporan</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <a href="{{ route('admin.users') }}" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Master Users</span>
            </a>
        </li>

        <li class="sidebar-title">Akun</li>

        <li class="sidebar-item">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-square"></i>
                <span>Profile</span>
            </a>
        </li>

        <livewire:auth.logout />

    </ul>
</div>
