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
                <i class="bi bi-megaphone-fill"></i>
                <span>Ajukan Pengaduan</span>
            </a>
        </li>

        <li class="sidebar-title">Track Semua Pengaduan</li>

        @php
        $status = request()->query('status');
    @endphp
        <li class="sidebar-item {{ request()->routeIs('user.complaints') && !request('status') ? 'active' : '' }}">
            <a href="{{ route('user.complaints') }}" class='sidebar-link'>
                <i class="bi bi-chat-fill"></i>
                <span>Semua Pengaduan/Report</span>
            </a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('user.complaints') && request('status') === 'pending' ? 'active' : '' }}">
            <a href="{{ route('user.complaints', ['status' => 'pending']) }}" class='sidebar-link'>
                <i class="bi bi-hourglass-split"></i>
                <span>Pending</span></a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('user.complaints') && request('status') === 'proses' ? 'active' : '' }}">
            <a href="{{ route('user.complaints', ['status' => 'proses']) }}" class='sidebar-link'>
                <i class="bi bi-arrow-repeat"></i>
                <span>Dalam Proses</span>
            </a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('user.complaints') && request('status') === 'selesai' ? 'active' : '' }}">
            <a href="{{ route('user.complaints', ['status' => 'selesai']) }}" class='sidebar-link'>
                <i class="bi bi-check-circle-fill"></i>
                <span>Selesai</span>
            </a>
        </li>

        <li class="sidebar-title">Pengaturan</li>


        <livewire:auth.logout />

    </ul>
</div>
