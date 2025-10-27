<div class="max-w-3xl mx-auto bg-gradient-to-br from-white to-blue-50 shadow-lg rounded-2xl p-8 mt-14 border border-blue-100">
    <h2 class="text-3xl font-extrabold mb-6 text-gray-800 flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 20h9M12 4H3m9 0v16m0-16l-9 8m9-8l9 8" />
        </svg>
        Buat Laporan Baru
    </h2>

    @if (session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-lg mb-5">
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        <!-- Judul -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Judul Laporan</label>
            <input type="text" wire:model="judul"
                class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm transition-all duration-200"
                placeholder="Contoh: Jalan rusak di depan kantor desa">
            @error('judul')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Isi -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Isi Laporan</label>
            <textarea wire:model="isi" rows="5"
                class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm transition-all duration-200 resize-none"
                placeholder="Tuliskan isi laporan dengan detail..."></textarea>
            @error('isi')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Foto -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Foto (opsional)</label>
            <input type="file" wire:model="foto"
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition-all duration-200" />
            @error('foto')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror

            @if ($foto)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-1 font-medium">Preview:</p>
                    <img src="{{ $foto->temporaryUrl() }}" class="rounded-xl border border-gray-200 shadow-md w-56">
                </div>
            @endif
        </div>

        <!-- Tombol -->
        <div class="pt-4 flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-semibold px-8 py-2.5 rounded-xl shadow transition-all duration-200">
                Kirim Laporan
            </button>
        </div>
    </form>
</div>
