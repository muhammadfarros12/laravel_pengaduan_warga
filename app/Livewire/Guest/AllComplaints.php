<?php

namespace App\Livewire\Guest;

use App\Models\Report;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class AllComplaints extends Component
{
    public function getDataProperty()
    {
        return Report::all();
    }
    public function render()
    {
        return view('livewire.guest.all-complaints');
    }
}
