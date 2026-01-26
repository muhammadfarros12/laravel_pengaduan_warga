<?php

namespace App\Livewire\Dashboard;

use App\Models\Report;
use Livewire\Component;
use App\Models\Complaint;

class Laporan extends Component
{
    public $status = null;

    protected $queryString = ['status'];

    public function getDataProperty()
    {
        return Report::when($this->status, fn($q) =>
            $q->where('status', $this->status)
        )->latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard.laporan');
    }
}


