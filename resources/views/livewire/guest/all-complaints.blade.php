@section('css')
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/table-datatable.css') }}">
@endsection

<div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Semua Pengaduan</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header text-center text-uppercase bg-primary text-white">
                    <h5 class="card-title">
                        Daftar Pengaduan Masyarakat
                    </h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-striped" id="pengaduan">
                            <thead class="table-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Pengadu</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->data as $value)
                                <tr>
                                    <td>
                                        @if ($value->photo)
                                            <img src="{{ asset('storage/' . $value->photo) }}"
                                                alt="{{ $value->title }}" class="img-fluid"
                                                style="max-width: 80px; height: auto">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $value->user->name ?? $value->guest_name }}
                                    </td>
                                    <td>
                                        {{ $value->title }}
                                    </td>
                                    <td><span class="badge"
                                            style="
                                    background-color:
                                    @if ($value->status == 'pending') #ff7976
                                    @elseif($value->status == 'selesai') #5ddab4
                                    @else #57caeb @endif">{{ strtoupper($value->status) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dataTable = new simpleDatatables.DataTable("#pengaduan");
        });
    </script>
@endpush
