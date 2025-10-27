<div class="max-w-6xl mx-auto mt-12 bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
    <h2 class="text-3xl font-extrabold mb-6 text-gray-900 flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Admin Dashboard: Semua Laporan
    </h2>

    @if (session()->has('success'))
        <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md mb-6 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-red-50 text-red-700 uppercase text-sm tracking-wider">
                    <th class="p-4 border-b">Judul</th>
                    <th class="p-4 border-b">Isi Laporan</th>
                     <th class="p-4 border-b">Gambar</th>
                    <th class="p-4 border-b">Pelapor</th>
                    <th class="p-4 border-b">Status</th>
                    <th class="p-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr class="hover:bg-red-50 transition duration-200">
                        <td class="p-4 border-b font-medium">{{ $report->judul }}</td>
                        <td class="p-4 border-b text-gray-600">{{ Str::limit($report->isi, 60) }}</td>
                        <td class="p-4 border-b">
                        @if($report->foto)
                        <img src="{{ asset('storage/' . $report->foto) }}" alt="Foto Laporan" class="w-20 h-20 object-cover rounded">
                        @else
                            Tidak ada foto
                         @endif
                        </td>
                        <td class="p-4 border-b">{{ $report->user->name ?? 'Tidak diketahui' }}</td>
                        <td class="p-4 border-b">
                            @php
                                $statusColors = [
                                    'baru' => 'bg-red-100 text-red-800',
                                    'diproses' => 'bg-yellow-100 text-yellow-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColors[$report->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($report->status) }}
                            </span>
                        </td>
                        <td class="p-4 border-b">
                            <button wire:click="selectReport({{ $report->id }})"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200 font-semibold">
                                Ubah Status
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($selectedReportId)
        <div class="mt-10 border-t pt-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-900">Ubah Status Laporan</h3>
            <div class="flex gap-4 items-center">
                <select wire:model="status" class="border rounded-lg p-3 shadow-sm focus:ring-2 focus:ring-red-500">
                    <option value="baru">Baru</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                </select>
                <button wire:click="updateStatus"
                    class="bg-red-600 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 font-bold">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    @endif
</div>
