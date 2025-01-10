<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast & Furious × Kuliner Nusantara</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff0000;
            --secondary-color: #ffffff;
            --background-color: #000000;
            --card-bg: #1a1a1a;
            --accent-color: #ffd700;
            --gradient-dark: linear-gradient(180deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--background-color);
            color: var(--secondary-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        nav {
            background: linear-gradient(180deg, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0) 100%);
            padding: 1.5rem;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(0,0,0,0.95);
            box-shadow: 0 0 20px rgba(255,0,0,0.3);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3rem;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        nav ul li a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-color);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        nav ul li a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .hero-section {
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-dark);
        }

        .hero-bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content {
            text-align: center;
            z-index: 2;
            padding: 2rem;
            animation: fadeInUp 1s ease;
        }

        .hero-title {
            font-family: 'Racing Sans One', cursive;
            font-size: 5rem;
            color: var(--secondary-color);
            text-transform: uppercase;
            margin-bottom: 1rem;
            text-shadow: 0 0 20px rgba(255,0,0,0.5);
            letter-spacing: 2px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        .section-title {
            font-family: 'Racing Sans One', cursive;
            text-align: center;
            font-size: 3rem;
            margin: 4rem 0;
            color: var(--secondary-color);
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-shadow: 0 0 10px rgba(255,0,0,0.3);
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
            margin: 1rem auto;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1600px;
            margin: 0 auto;
        }

        .menu-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.4s ease;
            background: var(--card-bg);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary-color), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .menu-card:hover {
            transform: translateY(-10px);
        }

        .menu-card:hover::before {
            opacity: 0.3;
        }

        .menu-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .menu-card:hover img {
            transform: scale(1.1);
        }

        .menu-content {
            padding: 1.5rem;
            background: linear-gradient(180deg, rgba(26,26,26,0.9) 0%, var(--card-bg) 100%);
        }

        .menu-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .menu-location {
            font-size: 1rem;
            color: #888;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .menu-description {
            color: #ddd;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }

            nav ul {
                gap: 1.5rem;
            }

            .menu-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#makanan">makanan</a></li>
            <li><a href="#minuman">Minuman</a></li>
            <li><a href="#about">About</a></li>
        </ul>
    </nav>

    <section class="hero-section" id="home">
        <img src="/api/placeholder/1920/1080" alt="Hero Background" class="hero-bg-video">
        <div class="hero-content">
            <h1 class="hero-title">Fast Food & Furious Flavors Turbo</h1>
            <p class="hero-subtitle">Kuliner Nusantara dengan Kecepatan Kilat</p>
        </div>
    </section>

    <section id="hidangan">
        <h2 class="section-title">Makanan Fast Food</h2>
        <div class="menu-grid">
            <div class="menu-card">
                <img src="view/rawon.jpg" alt="Rawon">
                <div class="menu-content">
                    <h3 class="menu-title">Rawon</h3>
                    <p class="menu-location">📍 Jawa Timur</p>
                    <p class="menu-description">Sup daging hitam legendaris dengan kluwek dan rempah pilihan. Sebuah masterpiece kuliner yang tak tertandingi.</p>
                </div>
            </div>
            <div class="menu-card">
                <img src="view/sate ayam.jpg" alt="Sate Ayam">
                <div class="menu-content">
                    <h3 class="menu-title">Sate Ayam</h3>
                    <p class="menu-location">📍 Jawa Tengah</p>
                    <p class="menu-description">Sate ayam dengan bumbu kacang khas Madura. Cepat dalam penyajian, furious dalam rasa.</p>
                </div>
            </div>
            <div class="menu-card">
                <img src="view/soto ayam ceker.jpg" alt="Soto Ayam">
                <div class="menu-content">
                    <h3 class="menu-title">Soto Ayam</h3>
                    <p class="menu-location">📍 Jawa Tengah</p>
                    <p class="menu-description">Soto Ayam ceker super dengan kaldu bening yang kaya rempah. Kecepatan rasa yang tak terlupakan.</p>
                </div>
            </div>
            <div class="menu-card">
                <img src="view/sop iga sapi.jpg" alt="Sop Iga">
                <div class="menu-content">
                    <h3 class="menu-title">Sop Iga</h3>
                    <p class="menu-location">📍 Jakarta</p>
                    <p class="menu-description">Sop Iga dengan daging premium yang super empuk. Sensasi rasa yang membuat adrenalin terpacu.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="minuman">
        <h2 class="section-title">Minuman Flavors Turbo</h2>
        <div class="menu-grid">
            <div class="menu-card">
                <img src="view/es campur.jpg" alt="Es Campur">
                <div class="menu-content">
                    <h3 class="menu-title">Es Campur</h3>
                    <p class="menu-location">📍 Jawa Barat</p>
                    <p class="menu-description">Campuran buah segar dengan sirup spesial. Nitrous boost untuk dahaga Anda.</p>
                </div>
                
            </div>
            <div class="menu-card">
                <img src="view/es dawet.jpg" alt="Es Dawet">
                <div class="menu-content">
                    <h3 class="menu-title">Es Dawet</h3>
                    <p class="menu-location">📍 Jawa Tengah</p>
                    <p class="menu-description">Minuman tradisional dengan cendol dan santan premium. Kelezatan yang melesat cepat.</p>
                </div>
            </div>
            <div class="menu-card">
                <img src="view/alpukat kocok.jpg" alt="Alpukat Kocok">
                <div class="menu-content">
                    <h3 class="menu-title">Alpukat Kocok</h3>
                    <p class="menu-location">📍 Yogyakarta</p>
                    <p class="menu-description">Alpukat super dikocok dengan kecepatan tinggi. Kesegaran yang tak tertandingi.</p>
                </div>
            </div>
            <div class="menu-card">
                <img src="view/es cincau.jpg" alt="Es Cincau">
                <div class="menu-content">
                    <h3 class="menu-title">Es Cincau</h3>
                    <p class="menu-location">📍 Bandung</p>
                    <p class="menu-description">Minuman segar dengan cincau hitam premium. Sensasi dingin yang melesat ke tenggorokan.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.querySelector('nav');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>