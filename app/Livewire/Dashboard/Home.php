<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Home extends Component
{
    public $totalLaporan, $laporanPending, $laporanDiproses, $laporanSelesai;

    public function mount(){
        $this->totalLaporan = \App\Models\Report::count();
        $this->laporanPending = \App\Models\Report::where('status', 'pending')->count();
        $this->laporanDiproses = \App\Models\Report::where('status', 'proses')->count();
        $this->laporanSelesai = \App\Models\Report::where('status', 'selesai')->count();
    }
    public function render()
    {
        return view('livewire.dashboard.home');
    }
}
