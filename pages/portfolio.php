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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>SnapScape: PORTFOLIO </title>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        .pre-portfolio {
            text-align: center;
            padding: 4rem 0;
        }
        .portfolio-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 2rem auto;
        }
        .generated-portfolio {
            display: none;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        input, textarea, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 0.5rem;
        }
        .upload-label {
            border: 2px dashed #ddd;
            padding: 2rem;
            display: block;
            text-align: center;
            cursor: pointer;
        }
        .preview-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin: 1rem auto;
            display: block;
        }
        .portfolio-header {
            text-align: center;
            padding: 2rem 0;
            background: white;
        }
        .modal-content {
            border-radius: 10px;
        }
        .portfolio-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            background: white;
            text-align: center;
        }
        .portfolio-card .btn {
            margin: 0.5rem;
        }
        .confetti-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1050;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <!-- HEADER FROM YOUR CODE -->
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
    <!-- Portfolio Creation/Edit Modal -->
    <div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="portfolioModalLabel">CREATE YOUR PORTFOLIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="portfolioForm" class="portfolio-form">
                        <input type="hidden" id="portfolioId">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="camera">Camera Name</label>
                            <input type="text" id="camera" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="about">About You</label>
                            <textarea id="about" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook ID</label>
                            <input type="text" id="facebook" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="upload-label">
                                Upload Profile Photo
                                <input type="file" id="photo" hidden accept="image/*">
                                <p>Click to upload</p>
                            </label>
                            <img id="preview" class="preview-image" style="display: none;">
                        </div>
                        <button type="submit" class="btn btn-brand">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <canvas id="confettiCanvas" class="confetti-canvas"></canvas>
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Portfolio Published</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Your portfolio has been successfully published!</p>
                    <p>Shareable Link: <a id="shareableLink" href="#" target="_blank">View Portfolio</a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="pre-portfolio" id="prePortfolio">
        <div class="container">
            <h2>CREATE YOUR PORTFLIO</h2>
            <p>Create a stunning portfolio to showcase your photography skills.</p>
            <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#portfolioModal">Create Now</button>
        </div>
    </div>
    <section id="my-portfolio" class="container">
        <h2>My Portfolio</h2>
        <div id="portfolioList" class="row"></div>
    </section>
    <div class="generated-portfolio" id="generatedPortfolio">
        <div class="portfolio-header">
            <img id="portfolioImage" class="preview-image">
            <h1 id="portfolioName"></h1>
            <p id="portfolioDetails"></p>
        </div>
        <div class="container" id="portfolioContent"></div>
    </div>
    <!-- FOOTER FROM YOUR CODE -->
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
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        // Debug modal initialization
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded, initializing portfolio builder');
            const portfolioButton = document.querySelector('[data-bs-target="#portfolioModal"]');
            if (portfolioButton) {
                console.log('Your Portfolio button found');
                portfolioButton.addEventListener('click', () => {
                    console.log('Your Portfolio button clicked');
                    const modal = new bootstrap.Modal(document.getElementById('portfolioModal'));
                    modal.show();
                });
            } else {
                console.error('Your Portfolio button not found');
            }
        });

        // Handle image preview
        const photoInput = document.getElementById('photo');
        const previewImg = document.getElementById('preview');
        photoInput.addEventListener('change', (e) => {
            console.log('Photo selected');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previewImg.src = reader.result;
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Generate UUID
        function generateUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, (c) => {
                const r = Math.random() * 16 | 0;
                const v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // Confetti animation
        function triggerConfetti() {
            console.log('Triggering confetti animation');
            const canvas = document.getElementById('confettiCanvas');
            const confetti = window.confetti.create(canvas, { resize: true });
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#0984e3', '#2d3436', '#ffffff']
            });
            setTimeout(() => confetti.reset(), 3000);
        }

        // Handle form submission
        const form = document.getElementById('portfolioForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log('Form submitted');
            const portfolioId = document.getElementById('portfolioId').value;
            const portfolioData = {
                id: portfolioId || generateUUID(),
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                camera: document.getElementById('camera').value,
                about: document.getElementById('about').value,
                facebook: document.getElementById('facebook').value,
                photo: previewImg.src || 'https://via.placeholder.com/200'
            };

            // Save to localStorage
            let portfolios = JSON.parse(localStorage.getItem('portfolios') || '[]');
            if (portfolioId) {
                portfolios = portfolios.map(p => p.id === portfolioId ? portfolioData : p);
            } else {
                portfolios.push(portfolioData);
            }
            localStorage.setItem('portfolios', JSON.stringify(portfolios));

            // Generate shareable link
            const shareableLink = `${window.location.origin}${window.location.pathname}?id=${portfolioData.id}`;
            const linkElement = document.getElementById('shareableLink');
            linkElement.href = shareableLink;
            linkElement.textContent = shareableLink;

            // Hide portfolio modal and show confirmation
            const portfolioModal = bootstrap.Modal.getInstance(document.getElementById('portfolioModal'));
            if (portfolioModal) {
                portfolioModal.hide();
                console.log('Portfolio modal hidden');
            } else {
                console.error('Portfolio modal instance not found');
            }
            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            confirmationModal.show();
            console.log('Confirmation modal shown');
            triggerConfetti();

            // Update UI
            displayPortfolio(portfolioData);
            displayPortfolioList();
            form.reset();
            previewImg.style.display = 'none';
            document.getElementById('portfolioId').value = '';
            document.getElementById('portfolioModalLabel').textContent = 'Create Your Portfolio';
        });

        // Display single portfolio
        function displayPortfolio(data) {
            console.log('Displaying portfolio:', data.name);
            const portfolioSection = document.getElementById('generatedPortfolio');
            document.getElementById('portfolioName').textContent = `${data.name}'s Portfolio`;
            document.getElementById('portfolioImage').src = data.photo;
            document.getElementById('portfolioDetails').innerHTML = `
                <p>📧 ${data.email} | 📷 ${data.camera} | <a href="${data.facebook}" target="_blank"><i class='bx bxl-facebook'></i> Facebook</a></p>
            `;
            const content = document.getElementById('portfolioContent');
            content.innerHTML = `
                <h2>About Me</h2>
                <p>${data.about}</p>
                <h2>My Work</h2>
                <div class="gallery">
                    <p>Gallery coming soon!</p>
                </div>
            `;
            document.getElementById('prePortfolio').style.display = 'none';
            portfolioSection.style.display = 'block';
        }

        // Display portfolio list
        function displayPortfolioList() {
            console.log('Rendering portfolio list');
            const portfolioList = document.getElementById('portfolioList');
            portfolioList.innerHTML = '';
            const portfolios = JSON.parse(localStorage.getItem('portfolios') || '[]');
            portfolios.forEach((portfolio) => {
                const card = document.createElement('div');
                card.className = 'col-md-4 portfolio-card';
                card.innerHTML = `
                    <img src="${portfolio.photo}" class="preview-image" alt="${portfolio.name}">
                    <h3>${portfolio.name}</h3>
                    <p>📷 ${portfolio.camera}</p>
                    <p><a href="${portfolio.facebook}" target="_blank"><i class='bx bxl-facebook'></i> Facebook</a></p>
                    <button class="btn btn-brand" onclick="displayPortfolio(${JSON.stringify(portfolio)})">View</button>
                    <button class="btn btn-warning" onclick="editPortfolio('${portfolio.id}')">Edit</button>
                    <button class="btn btn-danger" onclick="deletePortfolio('${portfolio.id}')">Delete</button>
                `;
                portfolioList.appendChild(card);
            });
        }

        // Edit portfolio
        function editPortfolio(id) {
            console.log('Editing portfolio:', id);
            const portfolios = JSON.parse(localStorage.getItem('portfolios') || '[]');
            const portfolio = portfolios.find(p => p.id === id);
            if (portfolio) {
                document.getElementById('portfolioId').value = portfolio.id;
                document.getElementById('name').value = portfolio.name;
                document.getElementById('email').value = portfolio.email;
                document.getElementById('camera').value = portfolio.camera;
                document.getElementById('about').value = portfolio.about;
                document.getElementById('facebook').value = portfolio.facebook;
                document.getElementById('preview').src = portfolio.photo;
                document.getElementById('preview').style.display = 'block';
                document.getElementById('portfolioModalLabel').textContent = 'Edit Your Portfolio';
                const portfolioModal = new bootstrap.Modal(document.getElementById('portfolioModal'));
                portfolioModal.show();
            }
        }

        // Delete portfolio
        function deletePortfolio(id) {
            console.log('Deleting portfolio:', id);
            if (confirm('Are you sure you want to delete this portfolio?')) {
                let portfolios = JSON.parse(localStorage.getItem('portfolios') || '[]');
                portfolios = portfolios.filter(p => p.id !== id);
                localStorage.setItem('portfolios', JSON.stringify(portfolios));
                displayPortfolioList();
                const portfolioSection = document.getElementById('generatedPortfolio');
                portfolioSection.style.display = 'none';
                document.getElementById('prePortfolio').style.display = 'block';
            }
        }

        // Load portfolio from URL parameter
        window.onload = () => {
            console.log('Checking URL for portfolio ID');
            const urlParams = new URLSearchParams(window.location.search);
            const portfolioId = urlParams.get('id');
            if (portfolioId) {
                const portfolios = JSON.parse(localStorage.getItem('portfolios') || '[]');
                const portfolio = portfolios.find((p) => p.id === portfolioId);
                if (portfolio) {
                    displayPortfolio(portfolio);
                }
            }
            displayPortfolioList();
        };
    </script>
</body>
</html>