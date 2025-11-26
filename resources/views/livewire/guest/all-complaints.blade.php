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
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 1"></td>
                                    <td>John Doe</td>
                                    <td>Pengaduan Kebersihan</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 2"></td>
                                    <td>Jane Smith</td>
                                    <td>Pengaduan Lalu Lintas</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 3"></td>
                                    <td>Ali Ahmad</td>
                                    <td>Pengaduan Kerusakan Jalan</td>
                                    <td><span class="badge bg-danger">Dalam Proses</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 1"></td>
                                    <td>John Doe</td>
                                    <td>Pengaduan Kebersihan</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 2"></td>
                                    <td>Jane Smith</td>
                                    <td>Pengaduan Lalu Lintas</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 3"></td>
                                    <td>Ali Ahmad</td>
                                    <td>Pengaduan Kerusakan Jalan</td>
                                    <td><span class="badge bg-danger">Dalam Proses</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 1"></td>
                                    <td>John Doe</td>
                                    <td>Pengaduan Kebersihan</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 2"></td>
                                    <td>Jane Smith</td>
                                    <td>Pengaduan Lalu Lintas</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 3"></td>
                                    <td>Ali Ahmad</td>
                                    <td>Pengaduan Kerusakan Jalan</td>
                                    <td><span class="badge bg-danger">Dalam Proses</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 1"></td>
                                    <td>John Doe</td>
                                    <td>Pengaduan Kebersihan</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 2"></td>
                                    <td>Jane Smith</td>
                                    <td>Pengaduan Lalu Lintas</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 3"></td>
                                    <td>Ali Ahmad</td>
                                    <td>Pengaduan Kerusakan Jalan</td>
                                    <td><span class="badge bg-danger">Dalam Proses</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 1"></td>
                                    <td>John Doe</td>
                                    <td>Pengaduan Kebersihan</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 2"></td>
                                    <td>Jane Smith</td>
                                    <td>Pengaduan Lalu Lintas</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td><img src="https://placehold.co/150x100" alt="Gambar 3"></td>
                                    <td>Ali Ahmad</td>
                                    <td>Pengaduan Kerusakan Jalan</td>
                                    <td><span class="badge bg-danger">Dalam Proses</span></td>
                                </tr>
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
