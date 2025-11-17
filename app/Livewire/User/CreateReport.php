<?php

namespace App\Livewire\User;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReport extends Component
{
    use WithFileUploads;

    public $title, $description, $image, $timeReport;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'timeReport' => 'required|date',
    ];

    public function save() {
        $this->validate();

        if ($this->image) {
            $this->image->storeAs('public/reports', $this->image->getClientOriginalName());
            $imageName = $this->image->getClientOriginalName();
        }

        Report::create([
            'reporter_id' => Auth::id(),
            'title' => $this->title,
            'detail' => $this->description,
            'photo' => $this->image ? $imageName : null,
            'status' => 'pending',
            'time_report' => $this->timeReport,
        ]);

        $this->reset();

        $this->js(<<<JS
            Swal.fire({
                icon: 'success',
                title: 'Laporan berhasil disimpan',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        JS);

        return $this->redirect(route('user.dashboard'), true);
    }

    public function render()
    {
        return view('livewire.user.create-report');
    }
}
