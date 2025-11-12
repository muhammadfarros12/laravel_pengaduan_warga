@section('title', 'Form Pengaduan')
<div class="d-flex flex-column" style="min-height: 65vh">
    @auth
        @if (Auth::user()->role == 'admin')
            <div class="page-heading">
                <h3>Anda Admin</h3>
                <p>Tidak bisa melakukan laporan</p>
            </div>
        @else
            <livewire:user.create-report />
        @endif
    @else
        {{-- <div class="text-center"> --}}
        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary">Login untuk membuat laporan</a>
        </div>
    @endauth

</div>
