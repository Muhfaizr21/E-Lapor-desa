<div class="max-w-3xl mx-auto mt-10 bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ $report->judul }}</h2>

    <p class="text-gray-600 mb-6">{{ $report->isi }}</p>

    @if ($report->foto)
        <img src="{{ asset($report->foto) }}" class="rounded-lg mb-6 max-h-80">
    @endif

    <div class="flex justify-between text-sm text-gray-500">
        <span>Status: <span class="font-semibold capitalize">{{ $report->status }}</span></span>
        <span>Dibuat: {{ $report->created_at->format('d M Y H:i') }}</span>
    </div>
</div>
