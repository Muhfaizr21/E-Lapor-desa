<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportList extends Component
{
    public function render()
    {
        $reports = Report::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.report-list', [
            'reports' => $reports,
        ])->layout('layouts.app'); // ✅ tambahkan ini biar pakai layout utama
    }
}
