<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;

class AdminReportList extends Component
{
    public $reports;
    public $selectedReportId;
    public $status;

    protected $listeners = ['report-submitted' => 'refreshReports'];

    public function mount()
    {
        $this->refreshReports();
    }

    public function refreshReports()
    {
        $this->reports = Report::latest()->get();
    }

    public function selectReport($id)
    {
        $this->selectedReportId = $id;
        $this->status = Report::find($id)?->status;
    }

    public function updateStatus()
    {
        $report = Report::findOrFail($this->selectedReportId);
        $report->update(['status' => $this->status]);

        $this->refreshReports();
        session()->flash('success', 'Status laporan berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.admin-report-list')
            ->layout('layouts.app'); // ✅ pastikan pakai layout utama
    }
}
