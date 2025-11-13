<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>


        </li>

        <li class="sidebar-item {{ request()->routeIs('user.form.complaint') ? 'active' : '' }}">
            <a href="{{ route('user.form.complaint') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Ajukan Pengaduan</span>
            </a>
        </li>

        <li class="sidebar-item has-sub ">
            <a href="" class='sidebar-link'>
                <i class="bi bi-megaphone-fill"></i>
                <span>Track Semua Pengaduan</span>
            </a>

            <ul class="submenu submenu-closed" style="--submenu-height: 215px;">
                <li class="submenu-item">
                    <a href="" class="submenu-link">Semua Pengaduan</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Pending</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Proses</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Selesai</a>
                </li>
            </ul>

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
