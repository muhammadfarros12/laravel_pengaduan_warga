<div>
    <div class="page-heading">
        <h3>Form Pengaduan Masyarakat</h3>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header text-center text-uppercase bg-primary text-white">
                        <h4 class="card-title">Edit Informasi Pengaduan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form wire:submit.prevent="update" class="form form-vertical" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">

                                        {{-- Judul --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="judul">Judul Laporan</label>
                                                <div class="position-relative">
                                                    <input readonly type="text" id="title" wire:model="title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="Masukkan judul laporan">
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
                                                    <input readonly type="date" id="timeReport" wire:model="timeReport"
                                                        class="form-control @error('timeReport') is-invalid @enderror">
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
                                                <label readonly for="description">Deskripsi Laporan</label>
                                                <div class="position-relative">
                                                    <textarea id="description" wire:model="description" rows="5"
                                                        class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan deskripsi laporan"></textarea>
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
                                                    <input type="file" id="image" accept="image/*"
                                                        wire:model="image"
                                                        class="form-control @error('image') is-invalid @enderror">
                                                </div>
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @if($image)
                                            {{-- preview gambar baru --}}
                                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail mt-2" width="200">
                                        @elseif($oldImage)
                                            {{-- tampilkan gambar lama --}}
                                            <img src="{{ asset('storage/' . $oldImage) }}" class="img-thumbnail mt-2" width="550">
                                        @endif
                                        </div>


                                        {{-- Status --}}
                                <div class="col-12 mt-3">
                                    <div class="form-group has-icon-left">
                                        <label for="status">Status Laporan</label>
                                        <div class="position-relative">
                                            <select id="status" wire:model="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                <option value="pending">Pending</option>
                                                <option value="proses">Diproses</option>
                                                <option value="selesai">Selesai</option>
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-check-circle"></i>
                                            </div>
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Respon --}}
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="response">Respon Laporan</label>
                                        <div class="position-relative">
                                            <textarea id="response" wire:model="response" rows="5" class="form-control @error('response') is-invalid @enderror" placeholder="Tuliskan respon laporan untuk informasi ke pelapor"></textarea>
                                            <div class="form-control-icon">
                                                <i class="bi bi-info-circle"></i>
                                            </div>
                                            @error('response')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                        {{-- Tombol --}}
                                        <div class="col-12 d-flex justify-content-end">
                                            <button wire:loading.attr="disabled" wire:target="update" type="submit"
                                                class="btn btn-primary me-1 mb-1">
                                                <span wire:loading.remove wire:target="update">Simpan</span>
                                                <span wire:loading wire:target="update"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                            </button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
