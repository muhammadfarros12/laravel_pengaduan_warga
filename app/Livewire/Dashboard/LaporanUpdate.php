<?php

namespace App\Livewire\Dashboard;

use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LaporanUpdate extends Component
{
    use WithFileUploads;

    public $laporan_id, $title, $description, $oldImage, $image, $status, $timeReport, $response;

    public function mount($id)
    {
        $laporan = Report::findOrFail($id);
        $this->laporan_id = $id;
        $this->title = $laporan->title;
        $this->description = $laporan->detail;
        $this->oldImage = $laporan->photo;
        $this->status = $laporan->status;
        $this->timeReport = $laporan->time_report;
        $this->response = $laporan->response;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,proses,selesai',
            'timeReport' => 'required|date',
            'response' => 'nullable|string',
        ]);


        $laporan = Report::findOrFail($this->laporan_id);
        $laporan->title = $this->title;
        $laporan->detail = $this->description;
        $laporan->status = $this->status;
        $laporan->time_report = $this->timeReport;
        $laporan->response = $this->response;

        if ($this->image) {

            // Hapus file lama kalau ada
            if ($laporan->photo && Storage::disk('public')->exists( $laporan->photo)) {
                Storage::disk('public')->delete($laporan->photo);
            }
            $fileName = time() . '_' . $this->image->getClientOriginalName();
            $imagePath = $this->image->storeAs('reports', $fileName, 'public');

            // Simpan nama file baru ke kolom photo
            $laporan->photo = $imagePath;
        }

        $laporan->save();

        return $this->redirect(route('admin.complaints'), true);

    }

    public function render()
    {
        return view('livewire.dashboard.laporan-update');
    }
}
