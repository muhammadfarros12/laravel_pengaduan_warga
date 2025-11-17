<div>
    <div class="page-heading">
        <h3>Form Pengaduan Masyarakat</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header text-center text-uppercase bg-primary text-white">
                        <h4 class="card-title">Masukkan Informasi Pengaduan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{-- <form class="form" wire:submit.prevent="save" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama Lengkap</label>
                                            <input wire:model='name' readonly type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Lengkap" name="fname-column" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="country-floating">Judul Pengaduan</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="country-floating" placeholder="Judul Pengaduan" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="last-name-column">Nomor Telepon</label>
                                            <input wire:model='telp' readonly disabled type="text" id="last-name-column" class="form-control"
                                                placeholder="Nomor Telepon" name="lname-column" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="company-column">Gambar</label>
                                            <input type="file" id="company-column" class="form-control"
                                                name="company-column" placeholder="Image" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="city-column">Alamat Email</label>
                                            <input wire:model='email' readonly disabled type="email" id="city-column" class="form-control"
                                                placeholder="Alamat Email" name="city-column" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="email-id-column">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="button" wire:click='resetForm' class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form> --}}
                            <form wire:submit.prevent="save" class="form form-vertical" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">

                                        {{-- Judul --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="judul">Judul Laporan</label>
                                                <div class="position-relative">
                                                    <input type="text" id="title" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul laporan">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-book"></i>
                                                    </div>
                                                    @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Tanggal --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="timeReport">Tanggal Laporan</label>
                                                <div class="position-relative">
                                                    <input type="date" id="timeReport" wire:model="timeReport" class="form-control @error('timeReport') is-invalid @enderror">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                    @error('timeReport')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Deskripsi --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="description">Deskripsi Laporan</label>
                                                <div class="position-relative">
                                                    <textarea id="description" wire:model="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan deskripsi laporan"></textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-info-circle"></i>
                                                    </div>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Gambar --}}
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="image">Gambar Laporan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text align-items-start">
                                                        <i class="bi bi-card-image"></i>
                                                    </span>
                                                    <input type="file" id="image" accept="image/*" wire:model="image" class="form-control @error('image') is-invalid @enderror">
                                                </div>
                                                @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            {{-- @if ($gambar)
                                            <div class="mt-2">
                                                <img src="{{ $gambar->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="150">
                                            </div>
                                            @endif --}}
                                        </div>


                                        {{-- Tombol --}}
                                        <div class="col-12 d-flex justify-content-end">
                                            <button
                                                wire:loading.attr="disabled"
                                                wire:target="save"
                                                type="submit"
                                                class="btn btn-primary me-1 mb-1">
                                                <span wire:loading.remove wire:target="save">Simpan</span>
                                                <span wire:loading wire:target="save" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
