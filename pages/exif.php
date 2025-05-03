<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <title>SnapScape : EXIF Extractor </title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <?php
    session_start();
    include 'db_connect.php';
    
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    
    $username = htmlspecialchars($_SESSION['username']);
    $usertype = htmlspecialchars($_SESSION['usertype']);
    
    // Handle logout
    if (isset($_GET['logout'])) {
        session_destroy();
        setcookie('username', '', time() - 3600, "/");
        header("Location: login.php");
        exit();
    }
    ?>
    
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
                <div class="dropdown ms-lg-3">
                    <a class="btn btn-brand dropdown-toggle d-flex align-items-center" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../img/avatar.png" alt="Avatar" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 8px;">
                        <div style="text-align: left;">
                            <span><?php echo $username; ?></span><br>
                            <small><?php echo ucfirst($usertype); ?></small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="?logout=true">Log Out</a></li>
                    </ul>
                </div>
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- INSERT DATA -->
    <section id="exif-extractor" class="exif-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>Advanced EXIF Analyzer</h2>
                    <p class="text-muted">Upload multiple images to extract detailed metadata</p>
                    <div class="drop-zone" id="dropZone">
                        <i class="bx bx-cloud-upload bx-lg"></i>
                        <p>Drag & Drop photos or click to upload (Multiple images supported)</p>
                        <input type="file" id="fileInput" accept="image/*" multiple>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary me-2" id="toggleAdvanced">Show Advanced Fields</button>
                        <button class="btn btn-secondary me-2" id="resetImages">Reset</button>
                        <button class="btn btn-success" id="downloadExif" disabled>Download EXIF Data</button>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="metadata-card" id="metadataCard">
                        <div id="imagePreviews" class="row mb-4"></div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Technical Metadata</h4>
                                <div class="technical-data" id="technicalData"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="analysis-card">
                        <h4>AI-Powered Insights</h4>
                        <div id="aiAnalysis"></div>
                        <h4 class="mt-4">GPS Location</h4>
                        <div class="gps-map" id="gpsMap"></div>
                    </div>
                </div>
            </div>
            <div class="progress mt-3" id="progressBar" style="display: none;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;" id="progressFill">0%</div>
            </div>
        </div>
    </section>

    <style>
        .exif-section {
            background: #2d3436;
            color: white;
            min-height: 100vh;
            padding: 2rem 0;
        }

        .drop-zone {
            border: 2px dashed #ff6b35;
            padding: 2rem;
            border-radius: 10px;
            cursor: pointer;
            background: #3b4345;
        }

        .metadata-card, .analysis-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid #4a5052;
            border-radius: 10px;
            padding: 1.5rem;
        }

        #imagePreviews img {
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #4a5052;
            margin-bottom: 1rem;
        }

        .technical-data {
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.9rem;
            max-height: 500px;
            overflow-y: auto;
            padding: 1rem;
            background: #3b4345;
            border-radius: 8px;
        }

        .data-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #4a5052;
        }

        .data-key {
            font-weight: 600;
            color: #ff6b35;
            flex: 0 0 40%;
        }

        .data-value {
            flex: 0 0 60%;
            word-break: break-all;
        }

        .analysis-card h4 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .gps-map {
            height: 300px;
            border-radius: 8px;
            border: 1px solid #4a5052;
        }

        .progress {
            height: 1.5rem;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script>
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const imagePreviews = document.getElementById('imagePreviews');
        const technicalData = document.getElementById('technicalData');
        const aiAnalysis = document.getElementById('aiAnalysis');
        const gpsMap = document.getElementById('gpsMap');
        const toggleAdvanced = document.getElementById('toggleAdvanced');
        const resetImages = document.getElementById('resetImages');
        const downloadExif = document.getElementById('downloadExif');
        const progressBar = document.getElementById('progressBar');
        const progressFill = document.getElementById('progressFill');

        let map, marker;
        let exifDataArray = [];
        let showAdvanced = false;

        // Initialize Leaflet Map
        function initMap() {
            if (map) map.remove();
            map = L.map('gpsMap', {
                center: [0, 0],
                zoom: 2,
                scrollWheelZoom: false
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        }
        initMap();

        // Handle Multiple Files
        function handleFiles(files) {
            exifDataArray = [];
            imagePreviews.innerHTML = '';
            technicalData.innerHTML = '';
            aiAnalysis.innerHTML = '';
            if (marker) marker.remove();
            initMap();

            progressBar.style.display = 'block';
            const totalFiles = files.length;
            let processedFiles = 0;

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Display Preview
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'col-md-4';
                    imgDiv.innerHTML = `<img src="${e.target.result}" data-index="${index}">`;
                    imagePreviews.appendChild(imgDiv);

                    // Extract EXIF
                    EXIF.getData(file, function() {
                        const allMetaData = EXIF.getAllTags(this);
                        exifDataArray.push({ file: file.name, data: allMetaData });
                        processedFiles++;
                        const progress = (processedFiles / totalFiles) * 100;
                        progressFill.style.width = `${progress}%`;
                        progressFill.textContent = `${Math.round(progress)}%`;

                        if (processedFiles === totalFiles) {
                            progressBar.style.display = 'none';
                            displayTechnicalData(exifDataArray[0].data, 0);
                            processGPSData(exifDataArray[0].data);
                            generateAIInsights(exifDataArray[0].data);
                            downloadExif.disabled = false;
                        }
                    });
                };
                reader.readAsDataURL(file);
            });
        }

        // Display Technical Data
        function displayTechnicalData(data, index) {
            const basicFields = ['Make', 'Model', 'DateTime', 'ExposureTime', 'FNumber', 'ISO', 'FocalLength', 'ApertureValue', 'ShutterSpeedValue'];
            const rows = Object.entries(data).map(([key, value]) => {
                const isAdvanced = !basicFields.includes(key);
                return `
                    <div class="data-row ${isAdvanced && !showAdvanced ? 'd-none' : ''}">
                        <span class="data-key">${key}</span>
                        <span class="data-value">${JSON.stringify(value)}</span>
                    </div>
                `;
            }).join('');
            technicalData.innerHTML = `<h5>Metadata for ${exifDataArray[index].file}</h5>${rows || '<p>No EXIF data available</p>'}`;
        }

        // Process GPS Data
        function processGPSData(data) {
            if (data.GPSLatitude && data.GPSLongitude) {
                const lat = convertGPS(data.GPSLatitude, data.GPSLatitudeRef);
                const lng = convertGPS(data.GPSLongitude, data.GPSLongitudeRef);
                map.setView([lat, lng], 13);
                marker = L.marker([lat, lng]).addTo(map).bindPopup('Photo Location').openPopup();
            } else {
                map.setView([0, 0], 2);
            }
        }

        // Convert GPS Coordinates
        function convertGPS(coords, ref) {
            const [deg, min, sec] = coords;
            const decimal = deg + min/60 + sec/3600;
            return (ref === 'S' || ref === 'W') ? -decimal : decimal;
        }

        // Generate AI Insights
        function generateAIInsights(data) {
            const insights = [];
            if (data.Make) insights.push(`📸 Camera: ${data.Make} ${data.Model || ''}`);
            if (data.ExposureTime) insights.push(`⏱ Exposure: ${data.ExposureTime}s`);
            if (data.FNumber) insights.push(`🔅 Aperture: f/${data.FNumber}`);
            if (data.ISO) insights.push(`⚡ ISO: ${data.ISO}`);
            if (data.FocalLength) insights.push(`🔍 Focal Length: ${data.FocalLength}mm`);
            if (data.DateTime) insights.push(`📅 Date: ${data.DateTime}`);
            if (data.ApertureValue) insights.push(`🎨 Aperture Value: ${data.ApertureValue}`);
            if (data.ShutterSpeedValue) insights.push(`🚀 Shutter Speed: ${data.ShutterSpeedValue}`);
            aiAnalysis.innerHTML = insights.length ? insights.map(i => `<p>${i}</p>`).join('') : '<p>No insights available</p>';
        }

        // Download EXIF Data
        function downloadExifData() {
            const dataStr = JSON.stringify(exifDataArray, null, 2);
            const blob = new Blob([dataStr], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'exif_data.json';
            a.click();
            URL.revokeObjectURL(url);
        }

        // Reset Images
        function resetImagesData() {
            exifDataArray = [];
            imagePreviews.innerHTML = '';
            technicalData.innerHTML = '';
            aiAnalysis.innerHTML = '';
            if (marker) marker.remove();
            initMap();
            downloadExif.disabled = true;
            fileInput.value = '';
        }

        // Event Listeners
        dropZone.addEventListener('click', () => fileInput.click());
        dropZone.addEventListener('dragover', (e) => e.preventDefault());
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            handleFiles(e.dataTransfer.files);
        });
        fileInput.addEventListener('change', (e) => handleFiles(e.target.files));

        toggleAdvanced.addEventListener('click', () => {
            showAdvanced = !showAdvanced;
            toggleAdvanced.textContent = showAdvanced ? 'Hide Advanced Fields' : 'Show Advanced Fields';
            document.querySelectorAll('.data-row').forEach(row => {
                const key = row.querySelector('.data-key').textContent;
                const isAdvanced = !['Make', 'Model', 'DateTime', 'ExposureTime', 'FNumber', 'ISO', 'FocalLength', 'ApertureValue', 'ShutterSpeedValue'].includes(key);
                if (isAdvanced) row.classList.toggle('d-none', !showAdvanced);
            });
        });

        resetImages.addEventListener('click', resetImagesData);
        downloadExif.addEventListener('click', downloadExifData);

        // Image Preview Click Handler
        imagePreviews.addEventListener('click', (e) => {
            if (e.target.tagName === 'IMG') {
                const index = parseInt(e.target.dataset.index);
                displayTechnicalData(exifDataArray[index].data, index);
                aiAnalysis.innerHTML = '';
                if (marker) marker.remove();
                initMap();
                processGPSData(exifDataArray[index].data);
                generateAIInsights(exifDataArray[index].data);
            }
        });
    </script>
    <!-- INSERT DATA END -->

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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>