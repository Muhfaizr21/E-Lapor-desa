<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Lapor') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-800">
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">E-Lapor Desa</h1>
            <div class="space-x-4">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.laporan.index') }}" class="text-gray-700 hover:text-red-600 font-semibold">Admin Dashboard</a>
                    @else
                        <a href="{{ route('lapor.create') }}" class="text-gray-700 hover:text-blue-600">Buat Laporan</a>
                        <a href="{{ route('laporan.list') }}" class="text-gray-700 hover:text-blue-600">Daftar Laporan</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="pt-24 px-4 sm:px-6 lg:px-8">
        {{ $slot ?? '' }}
    </main>



    @livewireScripts
</body>
</html>
