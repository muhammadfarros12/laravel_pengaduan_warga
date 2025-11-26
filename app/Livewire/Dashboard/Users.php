<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Users extends Component
{
    public $users, $deleteId;
    public $name, $email, $whatsapp, $address, $password;
    public $editId;
    public $isEditingSelf = false;

    public function mount()
    {
        $this->loadUser();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'whatsapp' => 'required|string|max:15',
            'address' => 'string|max:500',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'address' => $this->address,
            'password' => bcrypt($this->password),
        ]);

        $this->resetForm();

        // refresh
        $this->loadUser();
    }

    public function confirmEdit($id)
    {
        $user = User::find($id);
        $this->editId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->whatsapp = $user->whatsapp;
        $this->address = $user->address;
        $this->password = '';
        $this->deleteId = $id;

        // Cek apakah user yang diedit adalah user yang sedang login
        $this->isEditingSelf = (Auth::id() == $id);
        $this->dispatch('show-edit-user-modal');
    }

    public function updateUser()
    {
        if ($this->isEditingSelf) {
            // Edit diri sendiri, email terkunci
            $this->validate([
                'name' => 'required|string|max:255',
                'whatsapp' => 'required|string|max:15',
                'address' => 'nullable|string|max:500',
                'password' => 'nullable|string|min:8',
            ]);
        } else {
            // Edit user lain, email boleh diganti
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $this->editId,
                'whatsapp' => 'required|string|max:15',
                'address' => 'nullable|string|max:500',
                'password' => 'nullable|string|min:8',
            ]);
        }

        $user = User::find($this->editId);
        if (!$user) {
            return;
        }

        $dataToUpdate = [
            'name' => $this->name,
            'whatsapp' => $this->whatsapp,
            'address' => $this->address,
        ];

        if (!$this->isEditingSelf) {
            $dataToUpdate['email'] = $this->email;
        }

        if (!empty($this->password)) {
            $dataToUpdate['password'] = bcrypt($this->password);
        }

        $user->update($dataToUpdate);

        $this->loadUser();
        $this->resetForm();
        $this->dispatch('hide-edit-user-modal');
    }


    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('show-delete-modal');
    }

    public function deleteUser()
    {
        User::find($this->deleteId)->delete();
        $this->dispatch('hide-delete-modal');
        $this->loadUser();
    }

    public function loadUser(){
        $this->users = User::all();
    }

    // Method untuk cancel edit
    public function cancelEdit(){
        $this->resetForm();
        $this->dispatch('hide-edit-user-modal');
    }

    public function resetForm(){
        $this->name = '';
        $this->email = '';
        $this->whatsapp = '';
        $this->address = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.dashboard.users');
    }
}
