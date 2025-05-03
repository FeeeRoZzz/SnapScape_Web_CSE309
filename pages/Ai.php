<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap & Other CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Inter Font CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <title>SnapScape : AI TOOLS </title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* AI Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        .loading-screen.hidden {
            opacity: 0;
            pointer-events: none;
        }

        /* Animated Loading Text */
        .loading-text {
            color: #fff;
            font-size: 1.25rem;
            font-weight: 500;
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
            overflow: hidden;
            white-space: nowrap;
            animation: typewriter 2s steps(20) forwards, pulseText 1.5s infinite ease-in-out;
        }
        @keyframes typewriter {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes pulseText {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        /* Neural Network Animation */
        .neural-network {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.3;
        }
        .node {
            position: absolute;
            background: #60a5fa;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(96, 165, 250, 0.5);
            animation: pulseNode 2s infinite ease-in-out;
        }
        .connection {
            position: absolute;
            background: linear-gradient(to right, #60a5fa, transparent);
            height: 1px;
            animation: pulseConnection 1.5s infinite ease-in-out;
        }
        @keyframes pulseNode {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.4); opacity: 0.8; }
        }
        @keyframes pulseConnection {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        /* AI Orb */
        .ai-orb {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #3b82f6 0%, transparent 70%);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.7);
            animation: pulseOrb 2s infinite ease-in-out;
            margin-bottom: 1rem;
        }
        @keyframes pulseOrb {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.2); opacity: 1; }
        }

        /* Particle System */
        .particle {
            position: absolute;
            background: #60a5fa;
            border-radius: 50%;
            opacity: 0;
            animation: moveParticle 2s linear infinite;
        }
        @keyframes moveParticle {
            0% { opacity: 0.5; transform: translate(0, 0); }
            100% { opacity: 0; transform: translate(100px, -100px); }
        }

        /* Section Background */
        .bg-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(17, 24, 39, 0.1);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15), inset 0 0 8px rgba(59, 130, 246, 0.15);
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.2);
        }

        /* Polaroid Image Frame */
        .polaroid {
            background: #fff;
            padding: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }
        .polaroid:hover {
            transform: scale(1.05);
        }

        /* Button Styling */
        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #4f46e5);
            border-radius: 9999px;
            padding: 8px 20px;
            font-size: 0.875rem;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-gradient:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .btn-gradient:active {
            transform: scale(1.05);
        }
        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.4s ease, height 0.4s ease;
        }
        .btn-gradient:active::before {
            width: 200px;
            height: 200px;
        }

        /* Fade-in Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease-out forwards;
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- FIRST NAVBAR -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p><i class='bx bxs-envelope'></i> Contact@Snapscape.com.bd</p>
                    <p><i class='bx bxs-phone-call'></i> +8801872801865</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github'></i></a>
                    <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2ND NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">SNAPSCAPE<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">COURSES</a>
                    </li>
                </ul>
                <!-- <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a> -->
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- AI LOADING SCREEN -->
    <div class="loading-screen" id="loadingScreen">
        <div class="neural-network">
            <div class="node" style="width: 6px; height: 6px; top: 20%; left: 15%; animation-delay: 0s;"></div>
            <div class="node" style="width: 5px; height: 5px; top: 30%; left: 25%; animation-delay: 0.2s;"></div>
            <div class="node" style="width: 7px; height: 7px; top: 50%; left: 40%; animation-delay: 0.4s;"></div>
            <div class="node" style="width: 6px; height: 6px; top: 60%; left: 60%; animation-delay: 0.6s;"></div>
            <div class="node" style="width: 5px; height: 5px; top: 70%; left: 80%; animation-delay: 0.8s;"></div>
            <div class="connection" style="width: 80px; top: 20%; left: 15%; transform: rotate(45deg);"></div>
            <div class="connection" style="width: 100px; top: 30%; left: 25%; transform: rotate(-30deg);"></div>
            <div class="connection" style="width: 90px; top: 50%; left: 40%; transform: rotate(60deg);"></div>
            <div class="connection" style="width: 70px; top: 60%; left: 60%; transform: rotate(-45deg);"></div>
        </div>
        <div class="ai-orb"></div>
        <div class="loading-text">WELCOME - SNAPSCAPE. AI IS HERE ⚡ </div>
        <div class="particle" style="width: 4px; height: 4px; top: 45%; left: 45%; animation-delay: 0s;"></div>
        <div class="particle" style="width: 3px; height: 3px; top: 50%; left: 50%; animation-delay: 0.5s;"></div>
        <div class="particle" style="width: 5px; height: 5px; top: 55%; left: 55%; animation-delay: 1s;"></div>
    </div>

    <!-- AI FEATURES SECTION -->
    <section class="py-8 bg-section relative flex items-center">
        <div class="neural-network">
            <div class="node" style="width: 5px; height: 5px; top: 20%; left: 15%; animation-delay: 0s;"></div>
            <div class="node" style="width: 6px; height: 6px; top: 50%; left: 40%; animation-delay: 0.5s;"></div>
            <div class="node" style="width: 4px; height: 4px; top: 70%; left: 80%; animation-delay: 1s;"></div>
            <div class="connection" style="width: 70px; top: 20%; left: 15%; transform: rotate(45deg);"></div>
            <div class="connection" style="width: 90px; top: 50%; left: 40%; transform: rotate(-30deg);"></div>
        </div>
        <div class="container mx-auto px-4 max-w-5xl">
            <h2 class="text-xl font-semibold text-center text-white mb-6 fade-in"> EXPLORE AI-POWERED PHOTOGRAPHY TOOLS 🤖 </h2>
            <p class="text-center text-gray-300 text-sm mb-10 max-w-xl mx-auto fade-in" style="animation-delay: 0.2s;">
                Unleash Your Creativity With SnapScape’s Cutting-Edge AI tools , Designed To Elevate Your Photography Experience.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
             <!-- Feature 1: Background Removal -->
    <div class="glass-card p-8 text-center fade-in max-w-lg mx-auto" style="animation-delay: 0.4s;">
    <div class="polaroid mx-auto mb-4 w-60 h-40">
        <img src="../img/bgr.png" alt="Background Removal Thumbnail" class="w-full h-full object-cover block rounded">
    </div>
    <h3 class="text-lg font-semibold text-white mb-2">BACKGROUND REMOVAL</h3>
    <p class="text-gray-300 text-sm mb-4">Instantly Remove Backgrounds With Our AI For Clean & Professional Images.</p>
    <a href="bg-removal.php" class="btn-gradient text-white inline-block">TRY NOW</a>
    </div>
                <!-- Feature 2: Photo Retouching -->
<div class="glass-card p-8 text-center fade-in max-w-lg mx-auto" style="animation-delay: 0.6s;">
    <div class="polaroid mx-auto mb-4 w-60 h-40 overflow-hidden rounded shadow-lg">
        <img src="../img/en.jpg" alt="Photo Retouching Thumbnail" class="w-full h-full object-cover block">
    </div>
    <h3 class="text-lg font-semibold text-white mb-2"> PHOTO RETOUCHING </h3>
    <p class="text-gray-300 text-sm mb-4">Enhance Photos With AI-Driven Skin Smoothing & Lighting Adjustments & More.</p>
    <a href="retouch.php" class="btn-gradient text-white inline-block">TRY NOW</a>
</div>
                <!-- Feature 3: Photography Chatbot -->
<div class="glass-card p-8 text-center fade-in max-w-lg mx-auto" style="animation-delay: 0.8s;">
    <div class="polaroid mx-auto mb-4 w-60 h-40 relative overflow-hidden rounded shadow-lg">
        <img src="../img/chatbot.jpg" alt="Photography Chatbot Thumbnail" class="w-full h-full object-cover block">
        <div class="absolute top-1 right-1 bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded shadow">
            BETA
        </div>
    </div>
    <h3 class="text-lg font-semibold text-white mb-2">AI CHATBOT</h3>
    <p class="text-gray-300 text-sm mb-4">Get Instant Tips , Gear advice & Editing Tricks From Our AI Chatbot. So Hurry Up ! </p>
    <a href="chatbot.php" class="btn-gradient text-white inline-block">CHAT NOW </a>
</div>
            </div>
        </div>
    </section>

    <!-- FOOTER START -->
    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">SNAPSCAPE<span class="dot">.</span></h4>
                        <p>At SnapScape, we empower photography enthusiasts by combining creativity with cutting-edge technology.
                            Whether you’re a beginner or a pro, we help you capture, edit, and elevate your photos effortlessly.</p>
                        <div class="col-auto social-icons">
                            <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook'></i></a>
                            <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github'></i></a>
                            <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright By SnapScape Bangladesh (2025). All rights Reserved</p>
            Distributed By <a href="#">FEROZ MAHMUD</a>
        </div>
    </footer>

    <!-- JAVASCRIPT LINKERS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/app.js"></script>

    <!-- Loading Screen Script -->
    <script>
        window.addEventListener('load', () => {
            const loadingScreen = document.getElementById('loadingScreen');
            setTimeout(() => {
                loadingScreen.classList.add('hidden');
            }, 2500); // Fade out after 2.5 seconds
        });
    </script>