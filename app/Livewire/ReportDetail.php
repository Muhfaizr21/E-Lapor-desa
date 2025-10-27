<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;

class ReportDetail extends Component
{
    public $report;

    public function mount($id)
    {
        $this->report = Report::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.report-detail');
    }
}
