<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <!-- Bootstrap & Other CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>SnapScape : AI RETOUCHING </title>
    <style>
        /* Glassmorphism Card */
        .glass-card {
            background: rgba(31, 41, 55, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        /* Gradient Background with Texture */
        .bg-section {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            position: relative;
            overflow: hidden;
        }

        /* Particle Animation */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 10s infinite ease-in-out;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); opacity: 0.5; }
            50% { transform: translateY(-100px); opacity: 0.8; }
        }

        /* Neumorphic Buttons */
        .btn-neumorphic {
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2), -4px -4px 8px rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .btn-neumorphic:hover {
            box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.2), inset -2px -2px 4px rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Fade-in Animation */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Pulse Animation for Button */
        .pulse-enabled:not(:disabled) {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Polaroid Frame */
        .polaroid-frame {
            background: #fff;
            padding: 10px 10px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .polaroid-frame:hover {
            transform: rotate(2deg) scale(1.02);
        }

        /* Custom Loader */
        .custom-loader {
            width: 40px;
            height: 40px;
            border: 4px solid #3b82f6;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Tooltip */
        .tooltip-container {
            position: relative;
        }
        .tooltip {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #1f2937;
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 12px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        .tooltip-container:hover .tooltip {
            visibility: visible;
            opacity: 1;
            bottom: 120%;
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
                        <a class="nav-link" href="../#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#portfolio">COURSES</a>
                    </li>
                </ul>
                <!-- <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a> -->
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- PHOTO RETOUCHING SECTION -->
    <section class="py-12 bg-section min-h-screen relative">
        <div class="particles">
            <div class="particle" style="width: 10px; height: 10px; top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="width: 8px; height: 8px; top: 50%; left: 30%; animation-delay: 2s;"></div>
            <div class="particle" style="width: 12px; height: 12px; top: 70%; left: 80%; animation-delay: 4s;"></div>
        </div>
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-white mb-8 fade-in">AI Photo Retouching</h2>
            <p class="text-center text-gray-200 mb-12 max-w-2xl mx-auto fade-in" style="animation-delay: 0.2s;">
                Transform Your Photos With Cutting-Edge AI. Smooth Skin , Remove objects , Apply filters & Fine-Tune Lighting With a Magical Touch. Slide To Compare Before & After.
            </p>
            <div class="glass-card rounded-lg p-8 max-w-4xl mx-auto fade-in" style="animation-delay: 0.4s;">
                <!-- Upload Area -->
                <div class="text-center mb-8">
                    <label for="imageUpload" class="cursor-pointer inline-block bg-blue-600 text-white py-3 px-6 rounded-lg btn-neumorphic">
                        <i class='bx bx-upload mr-2'></i> UPLOAD IMAGE
                    </label>
                    <input type="file" id="imageUpload" accept="image/*" class="hidden" onchange="previewImage(event)">
                    <p class="text-gray-200 mt-2">Supported formats: JPG, PNG, WEBP (Max 10MB)</p>
                    
                </div>
                <!-- AI Controls -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 fade-in" style="animation-delay: 0.6s;">
                    <!-- Sliders -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Adjustments</h3>
                        <div class="mb-4 tooltip-container">
                            <label class="block text-sm text-gray-200">Brightness</label>
                            <input type="range" id="brightness" min="-0.5" max="0.5" step="0.01" value="0.1" class="w-full transform transition-transform hover:scale-105">
                            <span id="brightnessValue" class="text-sm text-gray-200">0.1</span>
                            <span class="tooltip">Adjusts image lightness for vibrant shots</span>
                        </div>
                        <div class="mb-4 tooltip-container">
                            <label class="block text-sm text-gray-200">Contrast</label>
                            <input type="range" id="contrast" min="-0.5" max="0.5" step="0.01" value="0.1" class="w-full transform transition-transform hover:scale-105">
                            <span id="contrastValue" class="text-sm text-gray-200">0.1</span>
                            <span class="tooltip">Enhances details and depth</span>
                        </div>
                        <div class="mb-4 tooltip-container">
                            <label class="block text-sm text-gray-200">Saturation</label>
                            <input type="range" id="saturation" min="-0.5" max="0.5" step="0.01" value="0.1" class="w-full transform transition-transform hover:scale-105">
                            <span id="saturationValue" class="text-sm text-gray-200">0.1</span>
                            <span class="tooltip">Boosts color intensity</span>
                        </div>
                        <div class="tooltip-container">
                            <label class="block text-sm text-gray-200">Skin Smoothing</label>
                            <input type="range" id="skinSmoothing" min="0" max="1" step="0.1" value="0.3" class="w-full transform transition-transform hover:scale-105">
                            <span id="skinSmoothingValue" class="text-sm text-gray-200">0.3</span>
                            <span class="tooltip">Smooths skin blemishes with AI precision</span>
                        </div>
                    </div>
                    <!-- Filters & Object Removal -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Enhancements</h3>
                        <div class="mb-4 tooltip-container">
                            <label class="block text-sm text-gray-200 mb-2">AI Filter Presets</label>
                            <select id="filterPreset" class="w-full p-2 border rounded-lg transform transition-transform hover:scale-105 bg-gray-800 text-white">
                                <option value="none">None</option>
                                <option value="vivid">Vivid</option>
                                <option value="softGlow">Soft Glow</option>
                                <option value="classic">Classic</option>
                            </select>
                            <span class="tooltip">Apply artistic styles instantly</span>
                        </div>
                        <div class="tooltip-container">
                            <label class="block text-sm text-gray-200 mb-2">Remove Object</label>
                            <input type="text" id="objectToRemove" placeholder="e.g., person, sign" class="w-full p-2 border rounded-lg bg-gray-800 text-white">
                            <p class="text-xs text-gray-200 mt-1">Enter object to remove (requires manual selection in Photoroom)</p>
                            <span class="tooltip">Erase unwanted elements with AI</span>
                        </div>
                    </div>
                </div>
                <!-- Before-After Slider -->
                <div class="relative w-full max-w-2xl mx-auto h-64 sm:h-96 polaroid-frame fade-in" style="animation-delay: 0.8s;">
                    <img id="originalPreview" src="" alt="Original Image" class="absolute inset-0 w-full h-full object-cover hidden">
                    <img id="processedPreview" src="" alt="Processed Image" class="absolute inset-0 w-full h-full object-cover hidden">
                    <div id="slider" class="absolute top-0 bottom-0 w-1 bg-blue-600 cursor-ew-resize hidden" style="left: 50%;">
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center transition-transform">
                            <i class='bx bx-chevron-left'></i><i class='bx bx-chevron-right'></i>
                        </div>
                    </div>
                    <p id="previewPlaceholder" class="absolute inset-0 flex items-center justify-center text-gray-400">No image uploaded</p>
                    <div id="loadingSpinner" class="absolute inset-0 flex items-center justify-center hidden">
                        <div class="custom-loader"></div>
                    </div>
                </div>
                <!-- Action Button -->
                <div class="text-center mt-8 fade-in" style="animation-delay: 1s;">
                    <button id="retouchButton" class="bg-blue-600 text-white py-3 px-6 rounded-lg btn-neumorphic pulse-enabled disabled:opacity-50" disabled>
                        RETOUCH IMAGE
                    </button>
                    <a id="downloadButton" href="#" download class="inline-block bg-green-600 text-white py-3 px-6 rounded-lg btn-neumorphic ml-4 hidden">
                        DOWNLOAD RESULT
                    </a>
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

    <!-- Photo Retouching and Animations -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const originalPreview = document.getElementById('originalPreview');
                    originalPreview.src = e.target.result;
                    originalPreview.classList.remove('hidden');
                    document.getElementById('previewPlaceholder').classList.add('hidden');
                    document.getElementById('retouchButton').disabled = false;
                };
                reader.readAsDataURL(file);
            }
        }

        // Update slider values
        ['brightness', 'contrast', 'saturation', 'skinSmoothing'].forEach(id => {
            const input = document.getElementById(id);
            const valueSpan = document.getElementById(id + 'Value');
            input.addEventListener('input', () => {
                valueSpan.textContent = input.value;
            });
        });

        document.getElementById('retouchButton').addEventListener('click', async () => {
            const file = document.getElementById('imageUpload').files[0];
            if (!file) return;

            // Show loading spinner
            document.getElementById('loadingSpinner').classList.remove('hidden');
            document.getElementById('previewPlaceholder').classList.add('hidden');
            document.getElementById('retouchButton').disabled = true;

            // Gather AI parameters
            const brightness = document.getElementById('brightness').value;
            const contrast = document.getElementById('contrast').value;
            const saturation = document.getElementById('saturation').value;
            const skinSmoothing = document.getElementById('skinSmoothing').value;
            const filterPreset = document.getElementById('filterPreset').value;
            const objectToRemove = document.getElementById('objectToRemove').value;

            // Build API URL with parameters
            let apiUrl = `https://image-api.photoroom.com/v2/edit?adjust.brightness=${brightness}&adjust.contrast=${contrast}&adjust.saturation=${saturation}`;
            if (skinSmoothing > 0) {
                apiUrl += `&adjust.smooth=${skinSmoothing}`;
            }
            if (filterPreset !== 'none') {
                apiUrl += `&preset=${filterPreset}`;
            }
            if (objectToRemove) {
                apiUrl += `&remove=${encodeURIComponent(objectToRemove)}`;
            }

            // Prepare API request
            const formData = new FormData();
            formData.append('imageFile', file);
            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'x-api-key': 'bf9a72070207af5248fd71f81db5a8a44e16b7c4' // Testing only
                    },
                    body: formData
                });

                if (!response.ok) throw new Error('API request failed');

                const imageBlob = await response.blob();
                const url = URL.createObjectURL(imageBlob);

                // Display processed image and show slider
                const processedPreview = document.getElementById('processedPreview');
                processedPreview.src = url;
                processedPreview.classList.remove('hidden');
                document.getElementById('slider').classList.remove('hidden');
                document.getElementById('loadingSpinner').classList.add('hidden');

                // Enable download button
                const downloadButton = document.getElementById('downloadButton');
                downloadButton.href = url;
                downloadButton.classList.remove('hidden');
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to retouch image. Please try again.');
                document.getElementById('loadingSpinner').classList.add('hidden');
                document.getElementById('previewPlaceholder').classList.remove('hidden');
                document.getElementById('retouchButton').disabled = false;
            }
        });

        // Before-After Slider Logic with Animation
        const slider = document.getElementById('slider');
        const processedPreview = document.getElementById('processedPreview');
        let isDragging = false;

        slider.addEventListener('mousedown', () => {
            isDragging = true;
            slider.querySelector('div').classList.add('scale-110');
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            slider.querySelector('div').classList.remove('scale-110');
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const container = slider.parentElement;
            const rect = container.getBoundingClientRect();
            let x = e.clientX - rect.left;
            x = Math.max(0, Math.min(x, rect.width));
            const percentage = (x / rect.width) * 100;
            slider.style.left = `${percentage}%`;
            processedPreview.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
        });

        // Touch support
        slider.addEventListener('touchstart', () => {
            isDragging = true;
            slider.querySelector('div').classList.add('scale-110');
        });

        document.addEventListener('touchend', () => {
            isDragging = false;
            slider.querySelector('div').classList.remove('scale-110');
        });

        document.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            const container = slider.parentElement;
            const rect = container.getBoundingClientRect();
            let x = e.touches[0].clientX - rect.left;
            x = Math.max(0, Math.min(x, rect.width));
            const percentage = (x / rect.width) * 100;
            slider.style.left = `${percentage}%`;
            processedPreview.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
        });
    </script>
</body>

</html>