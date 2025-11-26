<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <a href="{{ route('admin.users') }}" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Master Users</span>
            </a>
        </li>

        <li class="sidebar-title">Laporan</li>

        @php
            $status = request()->query('status');
        @endphp
        <li class="sidebar-item {{ request()->routeIs('admin.complaints') && !request('status') ? 'active' : '' }}">
            <a href="{{ route('admin.complaints') }}" class='sidebar-link'>
                <i class="bi bi-chat-fill"></i>
                <span>Semua Pengaduan/Report</span>
            </a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('admin.complaints') && request('status') === 'pending' ? 'active' : '' }}">
            <a href="{{ route('admin.complaints', ['status' => 'pending']) }}" class='sidebar-link'>
                <i class="bi bi-hourglass-split"></i>
                <span>Pending</span></a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('admin.complaints') && request('status') === 'proses' ? 'active' : '' }}">
            <a href="{{ route('admin.complaints', ['status' => 'proses']) }}" class='sidebar-link'>
                <i class="bi bi-arrow-repeat"></i>
                <span>Dalam Proses</span>
            </a>
        </li>
        <li
            class="sidebar-item {{ request()->routeIs('admin.complaints') && request('status') === 'selesai' ? 'active' : '' }}">
            <a href="{{ route('admin.complaints', ['status' => 'selesai']) }}" class='sidebar-link'>
                <i class="bi bi-check-circle-fill"></i>
                <span>Selesai</span>
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

@push('js')
    <script>
        document.addEventListener("livewire:navigated", () => {
            document.querySelectorAll('.sidebar-item.has-sub > a')
                .forEach(link => {
                    link.addEventListener('click', () => {
                        let parent = link.closest('.sidebar-item');
                        parent.classList.toggle('active');
                    });
                });
        });
    </script>
@endpush
