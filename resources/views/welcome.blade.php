<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLapor — Suara Anda, Aksi Nyata</title>

    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        html { scroll-behavior: smooth; }
        .glass {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.75);
        }
        .gradient-text {
            background: linear-gradient(to right, #2563eb, #00c6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .blob {
            position: absolute;
            background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
            opacity: 0.3;
            filter: blur(80px);
            z-index: -1;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-blue-50 via-white to-blue-50 text-gray-800 antialiased overflow-x-hidden">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 glass border-b border-blue-100">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-2">
                <i class="ri-megaphone-line text-3xl text-blue-600"></i>
                <span class="text-2xl font-extrabold gradient-text">eLapor</span>
            </div>

            <div class="hidden md:flex space-x-8 font-medium text-gray-700">
                <a href="#beranda" class="hover:text-blue-600">Beranda</a>
                <a href="#fitur" class="hover:text-blue-600">Fitur</a>
                <a href="#tentang" class="hover:text-blue-600">Tentang</a>
                <a href="#testimoni" class="hover:text-blue-600">Testimoni</a>
                <a href="#kontak" class="hover:text-blue-600">Kontak</a>
                @auth
                    <a href="{{ route('lapor.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl shadow hover:bg-blue-700 transition">Masuk</a>
                @endauth
            </div>

            <!-- Mobile -->
            <button id="menuToggle" class="md:hidden text-blue-700 focus:outline-none text-3xl">
                <i class="ri-menu-line"></i>
            </button>
        </div>

        <!-- Dropdown Mobile -->
        <div id="mobileMenu" class="hidden md:hidden flex flex-col bg-white border-t border-blue-100 px-6 py-4 space-y-3">
            <a href="#beranda" class="hover:text-blue-600">Beranda</a>
            <a href="#fitur" class="hover:text-blue-600">Fitur</a>
            <a href="#tentang" class="hover:text-blue-600">Tentang</a>
            <a href="#testimoni" class="hover:text-blue-600">Testimoni</a>
            <a href="#kontak" class="hover:text-blue-600">Kontak</a>
            @auth
                <a href="{{ route('lapor.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl text-center">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-5 py-2 rounded-xl text-center">Masuk</a>
            @endauth
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="pt-40 pb-28 relative overflow-hidden text-center">
        <div class="blob top-0 left-0 w-[600px] h-[600px] rounded-full"></div>
        <div class="blob bottom-0 right-0 w-[700px] h-[700px] rounded-full bg-blue-300 opacity-20"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold gradient-text leading-tight">
                Suara Anda, Wujudkan <span class="text-blue-900">Perubahan Nyata</span>
            </h1>
            <p class="mt-6 text-gray-600 text-lg md:text-xl max-w-2xl mx-auto">
                eLapor menghadirkan cara baru bagi masyarakat untuk menyampaikan aspirasi dan laporan kepada pemerintah dengan cepat, aman, dan transparan.
            </p>
            <div class="mt-10 flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-blue-700 transition shadow-lg hover:scale-105">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="border border-blue-600 text-blue-600 px-8 py-3 rounded-full font-semibold text-lg hover:bg-blue-50 transition hover:scale-105">Masuk</a>
            </div>
        </div>

        <!-- Scroll hint -->
        <div class="absolute bottom-10 w-full text-center">
            <a href="#fitur" class="inline-block animate-bounce text-blue-500">
                <i class="ri-arrow-down-s-line text-3xl"></i>
            </a>
        </div>
    </section>

    <!-- FITUR -->
    <section id="fitur" class="py-28 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-blue-700 mb-14" data-aos="fade-down">Fitur Unggulan eLapor</h2>

            <div class="grid md:grid-cols-3 gap-12">
                @php
                    $fitur = [
                        ['icon'=>'ri-flashlight-line','title'=>'Lapor Cepat','desc'=>'Kirim laporan dengan mudah hanya beberapa klik, langsung sampai ke pihak terkait.'],
                        ['icon'=>'ri-timer-line','title'=>'Pantau Status','desc'=>'Lihat perkembangan laporan secara real-time, lengkap dengan update status.'],
                        ['icon'=>'ri-shield-check-line','title'=>'Data Aman','desc'=>'Keamanan data Anda dijamin dengan sistem terenkripsi dan validasi pengguna.'],
                        ['icon'=>'ri-eye-line','title'=>'Transparansi Publik','desc'=>'Laporan dapat diakses publik untuk memastikan keterbukaan.'],
                        ['icon'=>'ri-chat-1-line','title'=>'Tanggap Cepat','desc'=>'Admin dan petugas langsung menerima notifikasi setiap laporan baru.'],
                        ['icon'=>'ri-bar-chart-box-line','title'=>'Analisis Laporan','desc'=>'Data laporan divisualisasikan untuk perencanaan pembangunan yang lebih baik.'],
                    ];
                @endphp

                @foreach ($fitur as $index => $f)
                <div class="p-8 bg-gradient-to-b from-blue-50 to-white rounded-3xl shadow-md hover:shadow-xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="text-blue-600 text-5xl mb-4"><i class="{{ $f['icon'] }}"></i></div>
                    <h4 class="text-2xl font-bold mb-3">{{ $f['title'] }}</h4>
                    <p class="text-gray-600 leading-relaxed">{{ $f['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-28 bg-gradient-to-br from-blue-50 via-white to-blue-100 relative overflow-hidden">
        <div class="blob w-[500px] h-[500px] bottom-0 left-0 bg-blue-300 opacity-30"></div>

        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12 relative z-10">
            <div class="md:w-1/2" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1581091012184-5c6c1d09e1b1?auto=format&fit=crop&w=1000&q=80" class="rounded-3xl shadow-lg hover:scale-105 transition-transform duration-700">
            </div>
            <div class="md:w-1/2" data-aos="fade-left">
                <h3 class="text-4xl font-bold text-blue-700 mb-6">Tentang eLapor</h3>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    eLapor adalah platform digital untuk mempercepat komunikasi antara masyarakat dan pemerintah.
                    Dibangun dengan prinsip transparansi dan akuntabilitas, eLapor memudahkan warga untuk berpartisipasi aktif dalam membangun daerahnya.
                </p>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-md hover:shadow-xl">Mulai Sekarang</a>
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section id="testimoni" class="py-28 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-bold text-blue-700 mb-16" data-aos="fade-down">Apa Kata Mereka</h3>
            <div class="grid md:grid-cols-3 gap-10">
                @foreach ([1,2,3] as $i)
                <div class="p-8 bg-gradient-to-br from-white to-blue-50 rounded-3xl shadow-lg hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                    <i class="ri-double-quotes-l text-blue-500 text-4xl mb-4"></i>
                    <p class="italic text-gray-600 mb-6">
                        @if($i == 1)
                            “Sekarang lapor jalan rusak bisa langsung dari HP! Prosesnya cepat banget.”
                        @elseif($i == 2)
                            “Sebagai admin, kami jadi lebih mudah memverifikasi dan menindaklanjuti laporan.”
                        @else
                            “Desain eLapor ini keren banget. Simple tapi elegan, mudah dipakai siapa pun.”
                        @endif
                    </p>
                    <h4 class="font-bold text-blue-700">
                        @if($i == 1) Rina Putri @elseif($i == 2) Ahmad S. @else Budi Ramadhan @endif
                    </h4>
                    <p class="text-sm text-gray-500">@if($i == 1) Warga Cirebon @elseif($i == 2) Admin eLapor @else Mahasiswa Polindra @endif</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="py-28 bg-gradient-to-b from-blue-50 to-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-blue-700 mb-8" data-aos="fade-down">Hubungi Kami</h3>
            <p class="text-gray-600 text-lg mb-8">Ada saran, pertanyaan, atau kendala? Kami siap membantu Anda kapan pun.</p>

            <form class="max-w-lg mx-auto bg-white rounded-3xl shadow-lg p-8 space-y-6" data-aos="fade-up">
                <div>
                    <input type="text" placeholder="Nama Anda" class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <input type="email" placeholder="Email Anda" class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <textarea placeholder="Pesan Anda" rows="5" class="w-full border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-blue-700 text-white py-10 mt-20 relative overflow-hidden">
        <div class="blob w-[400px] h-[400px] top-0 left-0 opacity-20 bg-blue-400"></div>
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center relative z-10">
            <div>
                <h4 class="text-2xl font-bold">eLapor</h4>
                <p class="text-sm text-blue-200 mt-2">Dari masyarakat, untuk masyarakat — menuju Indonesia yang lebih baik.</p>
            </div>
            <div class="flex space-x-5 mt-6 md:mt-0">
                <a href="#" class="text-white/80 hover:text-white text-2xl"><i class="ri-facebook-circle-fill"></i></a>
                <a href="#" class="text-white/80 hover:text-white text-2xl"><i class="ri-twitter-x-fill"></i></a>
                <a href="#" class="text-white/80 hover:text-white text-2xl"><i class="ri-instagram-fill"></i></a>
            </div>
        </div>
        <p class="text-center text-sm text-blue-200 mt-6 border-t border-blue-600 pt-4">
            &copy; {{ date('Y') }} eLapor. Semua Hak Dilindungi.
        </p>
    </footer>

    <!-- JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
