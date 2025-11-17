<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboard extends Component
{
    public $totalLaporan, $laporanPending, $laporanDiproses, $laporanSelesai;
    public function mount(){
        $user_id = Auth::user()->id;

        $this->totalLaporan = \App\Models\Report::where('reporter_id', $user_id)->count();
        $this->laporanPending = \App\Models\Report::where('reporter_id', $user_id)->where('status', 'pending')->count();
        $this->laporanDiproses = \App\Models\Report::where('reporter_id', $user_id)->where('status', 'proses')->count();
        $this->laporanSelesai = \App\Models\Report::where('reporter_id', $user_id)->where('status', 'selesai')->count();
    }

    public function render()
    {
        return view('livewire.user.user-dashboard');
    }
}
