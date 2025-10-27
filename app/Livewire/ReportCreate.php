<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportCreate extends Component
{
    use WithFileUploads;

    public $judul = '';
    public $isi = '';
    public $foto = null;

    protected $rules = [
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'foto' => 'nullable|image|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        $fotoPath = $this->foto
            ? $this->foto->store('public/laporan')
            : null;

        Report::create([
            'user_id' => Auth::id(),
            'judul' => Str::title(trim($this->judul)),
            'isi' => trim($this->isi),
            'foto' => $fotoPath ? str_replace('public/', 'storage/', $fotoPath) : null,
            'status' => 'baru',
        ]);

        $this->reset(['judul', 'isi', 'foto']);
        session()->flash('success', 'Laporan berhasil dikirim!');
        $this->dispatch('report-submitted');
    }

    public function render()
    {
        return view('livewire.report-create')
            ->layout('layouts.app');
    }
}
