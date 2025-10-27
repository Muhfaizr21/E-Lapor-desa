<div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Laporan Saya</h2>

    @if ($reports->isEmpty())
        <p class="text-gray-500">Belum ada laporan yang dibuat.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b">Judul</th>
                    <th class="p-3 border-b">Status</th>
                    <th class="p-3 border-b">Isi laporan</th>
                    <th class="p-3 border-b">Tanggal</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td class="p-3 border-b">{{ $report->judul }}</td>
                        <td class="p-3 border-b capitalize">{{ $report->status }}</td>
                        <td class="p-3 border-b capitalize">{{ $report->isi }}</td>
                        <td class="p-3 border-b">{{ $report->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
