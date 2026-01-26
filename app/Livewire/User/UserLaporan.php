<?php

namespace App\Livewire\User;

use App\Models\Report;
use Livewire\Component;

class UserLaporan extends Component
{
    public $status = null;

    protected $queryString = ['status'];

    public function getDataProperty()
    {
        return Report::when(
            $this->status,
            fn($q) =>
            $q->where('status', $this->status)
        )
        ->when(auth()->user(), fn($q) =>
            $q->where('reporter_id', auth()->user()->id)
        )
        ->latest()->get();
    }
    public function render()
    {
        return view('livewire.user.user-laporan');
    }
}
