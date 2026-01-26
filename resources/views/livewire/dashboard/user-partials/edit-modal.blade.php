<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white">Edit Data User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='updateUser'>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="edit-name">Nama Lengkap</label>
                                <input wire:model='name' type="text" class="form-control" placeholder="Nama Lengkap" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="edit-email">Email</label>
                                <input wire:model='email' type="email" class="form-control" placeholder="Email"
                                       @if($isEditingSelf) disabled @endif required>
                                @if($isEditingSelf)
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle"></i> Anda tidak dapat mengubah email Anda sendiri
                                    </small>
                                @endif
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="edit-whatsapp">Nomor Whatsapp</label>
                                <input wire:model='whatsapp' type="text" class="form-control" placeholder="Nomor Whatsapp" required>
                                @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="edit-password">Password</label>
                                <input wire:model='password' type="password" class="form-control" placeholder="Masukkan Password Baru">
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i> Kosongkan jika tidak ingin mengubah
                                </small>
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 col-12 mb-3">
                            <div class="form-group">
                                <label for="edit-address">Address</label>
                                <textarea wire:model='address' class="form-control" placeholder="Alamat tinggal" rows="3"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='cancelEdit' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
