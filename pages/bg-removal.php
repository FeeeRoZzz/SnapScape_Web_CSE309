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
    <!-- Tailwind CSS CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>SnapScape : BG REMOVE </title>
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
                
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- BACKGROUND REMOVAL SECTION -->
    <section class="py-12 bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">AI-Powered Background Removal</h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                Effortlessly remove backgrounds from your photos with our advanced AI tool. Upload an image and get a transparent background in seconds.
            </p>
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
                <!-- Upload Area -->
                <div class="text-center mb-8">
                    <label for="imageUpload" class="cursor-pointer inline-block bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition">
                        <i class='bx bx-upload mr-2'></i> UPLOAD IMAGE
                    </label>
                    <input type="file" id="imageUpload"—input— accept="image/*" class="hidden" onchange="previewImage(event)">
                    <p class="text-gray-500 mt-2">Supported formats: JPG, PNG (Max 10MB)</p>
                </div>
                <!-- Preview Area -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Original Image Preview -->
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">Original Image</h3>
                        <div class="border rounded-lg p-4 bg-gray-50 h-64 flex items-center justify-center">
                            <img id="originalPreview" src="" alt="Original Image" class="max-h-full max-w-full hidden">
                            <p id="originalPlaceholder" class="text-gray-400">No image uploaded</p>
                        </div>
                    </div>
                    <!-- Processed Image Preview -->
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">Background Removed</h3>
                        <div class="border rounded-lg p-4 bg-gray-50 h-64 flex items-center justify-center relative">
                            <img id="processedPreview" src="" alt="Processed Image" class="max-h-full max-w-full hidden">
                            <p id="processedPlaceholder" class="text-gray-400">Upload an image to see the result</p>
                            <div id="loadingSpinner" class="absolute hidden">
                                <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Action Button -->
                <div class="text-center mt-8">
                    <button id="removeBgButton" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition disabled:opacity-50" disabled>
                        REMOVE BACKGROUND
                    </button>
                    <a id="downloadButton" href="#" download class="inline-block bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition ml-4 hidden">
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

    <!-- Background Removal Script -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const originalPreview = document.getElementById('originalPreview');
                    originalPreview.src = e.target.result;
                    originalPreview.classList.remove('hidden');
                    document.getElementById('originalPlaceholder').classList.add('hidden');
                    document.getElementById('removeBgButton').disabled = false;
                };
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('removeBgButton').addEventListener('click', async () => {
            const file = document.getElementById('imageUpload').files[0];
            if (!file) return;

            // Show loading spinner
            document.getElementById('loadingSpinner').classList.remove('hidden');
            document.getElementById('processedPlaceholder').classList.add('hidden');
            document.getElementById('removeBgButton').disabled = true;

            // Prepare API request
            const formData = new FormData();
            formData.append('image_file', file);
            try {
                const response = await fetch('https://api.remove.bg/v1.0/removebg', {
                    method: 'POST',
                    headers: {
                        'X-Api-Key': 'Qh86TK6cqUMqZ5UQoLTh8eys' // Embedded for testing only
                    },
                    body: formData
                });

                if (!response.ok) throw new Error('API request failed');

                const blob = await response.blob();
                const url = URL.createObjectURL(blob);

                // Display processed image
                const processedPreview = document.getElementById('processedPreview');
                processedPreview.src = url;
                processedPreview.classList.remove('hidden');
                document.getElementById('loadingSpinner').classList.add('hidden');

                // Enable download button
                const downloadButton = document.getElementById('downloadButton');
                downloadButton.href = url;
                downloadButton.classList.remove('hidden');
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to remove background. Please try again.');
                document.getElementById('loadingSpinner').classList.add('hidden');
                document.getElementById('processedPlaceholder').classList.remove('hidden');
                document.getElementById('removeBgButton').disabled = false;
            }
        });
    </script>
</body>

</html>