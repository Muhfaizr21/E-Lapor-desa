<?php

namespace App\Livewire;

use Livewire\Component;

class ChatBot extends Component
{
    public $messages = [];
    public $input = '';
    public $open = false;

    public function sendMessage()
    {
        $text = trim($this->input);
        if ($text === '') return;

        // Tambah pesan user
        $this->messages[] = ['user' => true, 'text' => $text];

        // Generate jawaban pintar
        $reply = $this->getSmartReply($text);

        $this->messages[] = ['user' => false, 'text' => $reply];

        $this->input = '';
    }

    protected function getSmartReply($text)
    {
        $textLower = strtolower($text);

        // Pola pertanyaan umum
        $patterns = [
            'lapor|buat laporan|status laporan' => "Kamu bisa membuat laporan melalui Dashboard, lalu pantau statusnya secara real-time. Jika ingin, klik 'Dashboard'.",
            'fitur|apa saja fitur|unggulan' => "Fitur eLapor meliputi: Lapor Cepat, Pantau Status, Data Aman, Transparansi Publik, Tanggap Cepat, dan Analisis Laporan.",
            'tentang|apa itu elapor' => "eLapor adalah platform digital yang memudahkan warga menyampaikan aspirasi dan laporan ke pemerintah secara cepat, aman, dan transparan.",
            'kontak|hubungi' => "Kamu bisa menghubungi kami melalui formulir kontak di landing page pada bagian 'Kontak'.",
            'admin|dashboard' => "Admin bisa memverifikasi dan menindaklanjuti laporan warga. Dashboard menampilkan semua laporan dan statusnya.",
            'halo|hai|hi' => "Halo! Selamat datang di eLapor. Tanyakan apa saja tentang laporan, fitur, dashboard, atau kontak.",
        ];

        foreach ($patterns as $pattern => $response) {
            if (preg_match("/$pattern/i", $textLower)) {
                return $response;
            }
        }

        // Default response
        return "Maaf, saya belum mengerti. Coba tanya tentang laporan, fitur, dashboard, admin, atau kontak.";
    }

    public function clearChat()
    {
        $this->messages = [];
    }

    public function toggleChat()
    {
        $this->open = !$this->open;
    }

    public function render()
    {
        return view('livewire.chat-bot');
    }
}
