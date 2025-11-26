<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public $totalLaporan, $laporanPending, $laporanDiproses, $laporanSelesai;
    public $monthlyReport;

    public function mount(){
        $this->totalLaporan = \App\Models\Report::count();
        $this->laporanPending = \App\Models\Report::where('status', 'pending')->count();
        $this->laporanDiproses = \App\Models\Report::where('status', 'proses')->count();
        $this->laporanSelesai = \App\Models\Report::where('status', 'selesai')->count();

        $this->monthlyReport = \App\Models\Report::whereYear('time_report', now()->year)
        ->get()
        ->groupBy(function ($item) {
            return Carbon::parse($item->time_report)->format('m');
        })
        ->map->count()
        ->toArray();
    }
    public function render()
    {
        return view('livewire.dashboard.home');
    }
}
