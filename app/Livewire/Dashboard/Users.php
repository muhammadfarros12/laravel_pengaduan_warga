<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users, $deleteId;

    public function mount(){
        $this->loadUser();
    }

    public function confirmDelete($id){
        $this->deleteId = $id;
        $this->dispatch('show-delete-modal');
    }

    public function deleteUser(){
        // User::find($this->deleteId)->delete();
        $this->dispatch('hide-delete-modal');
        $this->loadUser();
    }

    public function loadUser() {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.dashboard.users');
    }
}
