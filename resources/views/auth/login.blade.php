<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLapor - Login</title>
    @vite('resources/css/app.css')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .auth-container {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 1rem;
        }

        .glass-card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2rem;
            padding: 3rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card h2 {
            color: #fff;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .glass-card form input[type="text"],
        .glass-card form input[type="email"],
        .glass-card form input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            border-radius: 9999px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 1rem;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card form input:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
        }

        .glass-card form button {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 9999px;
            border: none;
            background: #0ea5e9;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .glass-card form button:hover {
            background: #0284c7;
            transform: scale(1.03);
        }

        .glass-card .links {
            text-align: center;
            margin-top: 1rem;
        }

        .glass-card .links a {
            color: #fff;
            text-decoration: underline;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .glass-card .links a:hover {
            color: #0ea5e9;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>

    <div class="auth-container" data-aos="fade-up">
        <div class="glass-card">
            <h2>Selamat Datang di eLapor</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>
            <div class="links">
                <a href="{{ route('password.request') }}">Lupa password?</a> <br>
                <a href="{{ route('register') }}">Belum punya akun? Daftar</a>
            </div>
        </div>
    </div>

    <script>
        // ParticlesJS Config
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80 },
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle" },
                "opacity": { "value": 0.5 },
                "size": { "value": 3 },
                "line_linked": { "enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.4, "width": 1 },
                "move": { "enable": true, "speed": 2 }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "grab" }, "onclick": { "enable": true, "mode": "push" } }
            },
            "retina_detect": true
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1200, once: true });
    </script>
</body>
</html>
