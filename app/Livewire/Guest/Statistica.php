<?php

namespace App\Livewire\Guest;

use App\Models\Report;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Statistica extends Component
{

    public $totalReports, $pendingReports, $inProcessReports, $completedReports, $monthlyReport;
    public function mount(){
        $this->totalReports = Report::count();
        $this->pendingReports = Report::where('status', 'pending')->count();
        $this->inProcessReports = Report::where('status', 'proses')->count();
        $this->completedReports = Report::where('status', 'selesai')->count();

        $this->monthlyReport = Report::whereYear('time_report', now()->year)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->time_report)->format('m');
            })
            ->map->count()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.guest.statistica');
    }
}
