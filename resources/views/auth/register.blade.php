<x-guest-layout>
    <!-- Background Gradient & Glow -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-300/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 w-80 h-80 bg-pink-200/10 rounded-full blur-2xl animate-pulse -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <!-- Form Card -->
    <div class="relative z-10 w-full max-w-md mx-auto mt-20 bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-10 border border-white/20">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 mb-2">Daftar Akun</h1>
            <p class="text-gray-600 text-sm">Bergabung dengan <span class="font-semibold text-blue-600">eLapor</span> dan mulai kirim laporan dengan mudah.</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 bg-white/80"
                    placeholder="Masukkan nama Anda">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 bg-white/80"
                    placeholder="contoh@email.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Kata Sandi</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 bg-white/80"
                    placeholder="********">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400 bg-white/80"
                    placeholder="********">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-xl font-semibold text-lg hover:scale-105 transition transform shadow-lg">
                    Daftar Sekarang
                </button>
            </div>

            <!-- Divider -->
            <div class="flex items-center justify-center my-6">
                <span class="w-1/5 border-t border-gray-300"></span>
                <span class="mx-2 text-gray-400 text-sm">atau</span>
                <span class="w-1/5 border-t border-gray-300"></span>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-purple-600 transition">Masuk Sekarang</a>
                </p>
            </div>
        </form>
    </div>

    <!-- Floating Glow Circles -->
    <div class="absolute bottom-10 left-16 w-28 h-28 bg-blue-300/20 rounded-full blur-2xl animate-pulse"></div>
    <div class="absolute top-28 right-16 w-36 h-36 bg-purple-400/20 rounded-full blur-3xl animate-pulse"></div>
</x-guest-layout>
