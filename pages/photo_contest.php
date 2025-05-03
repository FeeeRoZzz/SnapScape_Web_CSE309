<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Ensure session is active
if (session_id() === '') {
    session_start();
}
// Initialize photos.json
$jsonFile = 'photos.json';
if (!file_exists($jsonFile)) {
    file_put_contents($jsonFile, json_encode([]));
    error_log("Created new photos.json");
}
// Set user_id
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 'user_' . uniqid();
    error_log("New user_id set: " . $_SESSION['user_id']);
}
$currentUserId = $_SESSION['user_id'];
error_log("Session user_id: " . $currentUserId . ", Session ID: " . session_id());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <title>SnapScape : CONTEST </title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
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
                    <li class="nav-item"><a class="nav-link" href="#home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">SERVICES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">COURSES</a></li>
                </ul>
                
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>
    <section id="contest" class="contest-section py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="mb-4">SnapScape Photo Contest</h2>
                    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#submitPhotoModal">SUBMIT YOUR PHOTO</button>
                    <div class="filter-buttons mb-4">
                        <button class="btn btn-filter active" data-filter="all">All</button>
                        <button class="btn btn-filter" data-filter="nature">Nature</button>
                        <button class="btn btn-filter" data-filter="portrait">Portrait</button>
                        <button class="btn btn-filter" data-filter="urban">Urban</button>
                    </div>
                </div>
            </div>
            <div class="row g-4 photo-grid" id="photoGrid"></div>
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="leaderboard-card">
                        <h3><i class="fas fa-trophy"></i> Current Leaderboard</h3>
                        <ol id="leaderboard"></ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="submitPhotoModal" tabindex="-1" aria-labelledby="submitPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="submitPhotoModalLabel">Submit Your Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Fill in all fields to submit your photo to the contest.</p>
                    <form id="photoSubmissionForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="photographerName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="photographerName" name="photographerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="cameraDetails" class="form-label">Camera Details</label>
                            <input type="text" class="form-control" id="cameraDetails" name="cameraDetails" placeholder="e.g., Canon EOS 5D, iPhone 14" required>
                        </div>
                        <div class="mb-3">
                            <label for="photoTitle" class="form-label">Photo Title</label>
                            <input type="text" class="form-control" id="photoTitle" name="photoTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="photoCategory" class="form-label">Category</label>
                            <select class="form-control" id="photoCategory" name="photoCategory" required>
                                <option value="nature">Nature</option>
                                <option value="portrait">Portrait</option>
                                <option value="urban">Urban</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="photoUpload" class="form-label">Upload Photo</label>
                            <input type="file" class="form-control" id="photoUpload" name="photoUpload" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPhotoModal" tabindex="-1" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPhotoModalLabel">Edit Your Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Update your photo details. Leave the file field empty to keep the current image.</p>
                    <form id="editPhotoForm" action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="editPhotoId" name="photoId">
                        <div class="mb-3">
                            <label for="editPhotographerName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="editPhotographerName" name="photographerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCameraDetails" class="form-label">Camera Details</label>
                            <input type="text" class="form-control" id="editCameraDetails" name="cameraDetails" placeholder="e.g., Canon EOS 5D, iPhone 14" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhotoTitle" class="form-label">Photo Title</label>
                            <input type="text" class="form-control" id="editPhotoTitle" name="photoTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhotoCategory" class="form-label">Category</label>
                            <select class="form-control" id="editPhotoCategory" name="photoCategory" required>
                                <option value="nature">Nature</option>
                                <option value="portrait">Portrait</option>
                                <option value="urban">Urban</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editPhotoUpload" class="form-label">Upload New Photo (optional)</label>
                            <input type="file" class="form-control" id="editPhotoUpload" name="photoUpload" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .contest-section { background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); min-height: 100vh; }
        .photo-card { position: relative; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); background: #fff; }
        .photo-card:hover { transform: translateY(-8px); box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); }
        .photo-image { height: 320px; object-fit: cover; width: 100%; background: #f0f0f0; }
        .photo-info { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent); color: white; padding: 1.8rem; font-size: 0.95rem; }
        .photo-info h5 { font-size: 1.2rem; margin-bottom: 0.5rem; }
        .photo-info p { margin: 0; opacity: 0.9; }
        .vote-btn { position: absolute; top: 20px; right: 20px; background: #ffffff; border: 2px solid #e74c3c; border-radius: 30px; padding: 8px 18px; display: flex; align-items: center; gap: 6px; transition: all 0.3s ease; font-weight: 500; cursor: pointer; }
        .vote-btn:hover { background: #e74c3c; color: white; transform: scale(1.1); }
        .vote-btn.voted { background: #e74c3c; color: white; cursor: default; }
        .action-btns { position: absolute; top: 20px; left: 20px; display: flex; gap: 10px; }
        .action-btns button { background: #ffffff; border: 2px solid #333; border-radius: 20px; padding: 5px 10px; font-size: 0.9rem; transition: all 0.3s ease; cursor: pointer; }
        .action-btns button:hover { background: #333; color: white; }
        .leaderboard-card { background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); }
        .btn-filter { margin: 0 5px; transition: all 0.3s ease; border: 2px solid #e74c3c; color: #e74c3c; }
        .btn-filter.active { background: #e74c3c; color: white; }
        .voted { border: 3px solid #e74c3c; background: rgba(231, 76, 60, 0.05); animation: votedPulse 1.5s ease-in-out; }
        @keyframes votedPulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.7); }
            50% { transform: scale(1.03) translateX(2px); box-shadow: 0 0 20px rgba(231, 76, 60, 0.5); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.7); }
        }
        .tooltip .tooltip-inner { background: #333; color: white; border-radius: 5px; }
    </style>
    <script>
        let photos = [];
        const showAllButtons = true; // Force buttons for testing
        async function loadPhotos() {
            try {
                console.log('Fetching photos from photos.json');
                const response = await fetch('photos.json?_=' + new Date().getTime());
                if (!response.ok) {
                    console.error('Failed to fetch photos.json, status:', response.status);
                    throw new Error('Failed to fetch photos.json');
                }
                const serverPhotos = await response.json();
                console.log('Loaded server photos:', serverPhotos.length);
                photos = serverPhotos.length > 0 ? serverPhotos : photos;
            } catch (error) {
                console.error('Error loading photos:', error);
                photos = [{
                    id: 1,
                    title: 'Test Photo',
                    photographer: 'Test User',
                    camera: 'Test Camera',
                    votes: 0,
                    category: 'nature',
                    image: 'https://picsum.photos/800/600?random=1',
                    userId: '<?php echo $currentUserId; ?>'
                }];
                console.log('Using fallback photo');
            }
            const currentUserId = '<?php echo $currentUserId; ?>';
            console.log('Current user ID:', currentUserId);
            renderPhotos(photos);
            updateLeaderboard();
        }
        document.getElementById('photoSubmissionForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            console.log('Form submitted');
            const form = e.target;
            const formData = new FormData(form);
            try {
                const response = await fetch('upload.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                console.log('Server response:', result);
                if (result.success) {
                    alert('Photo submitted successfully!');
                    form.reset();
                    const modal = bootstrap.Modal.getInstance(document.getElementById('submitPhotoModal'));
                    modal.hide();
                    await loadPhotos();
                    document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
                    document.querySelector('.btn-filter[data-filter="all"]').classList.add('active');
                    filterPhotos('all');
                    console.log('Grid refreshed after submission');
                } else {
                    alert('Error: ' + result.message);
                    console.error('Submission error:', result.message);
                }
            } catch (error) {
                alert('Error submitting photo. Please try again.');
                console.error('Fetch error:', error);
            }
        });
        document.getElementById('editPhotoForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            console.log('Edit form submitted');
            const form = e.target;
            const photographer = document.getElementById('editPhotographerName').value.trim();
            const camera = document.getElementById('editCameraDetails').value.trim();
            const title = document.getElementById('editPhotoTitle').value.trim();
            if (!photographer || !camera || !title) {
                alert('Please fill in all required fields.');
                console.error('Edit form validation failed');
                return;
            }
            const formData = new FormData(form);
            try {
                const response = await fetch('edit.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                console.log('Edit response:', result);
                if (result.success) {
                    alert('Photo updated successfully!');
                    form.reset();
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editPhotoModal'));
                    modal.hide();
                    await loadPhotos();
                    filterPhotos(document.querySelector('.btn-filter.active').dataset.filter);
                } else {
                    alert('Error: ' + result.message);
                    console.error('Edit error:', result.message);
                }
            } catch (error) {
                alert('Error updating photo. Please try again.');
                console.error('Fetch error:', error);
            }
        });
        function populateEditModal(photoId) {
            const photo = photos.find(p => p.id === photoId);
            if (photo) {
                document.getElementById('editPhotoId').value = photo.id;
                document.getElementById('editPhotographerName').value = photo.photographer;
                document.getElementById('editCameraDetails').value = photo.camera;
                document.getElementById('editPhotoTitle').value = photo.title;
                document.getElementById('editPhotoCategory').value = photo.category;
                const modal = new bootstrap.Modal(document.getElementById('editPhotoModal'));
                modal.show();
            }
        }
        async function handleDelete(photoId) {
            if (!confirm('Are you sure you want to delete this photo?')) return;
            console.log('Deleting photo:', photoId);
            try {
                const response = await fetch('delete.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ photoId })
                });
                const result = await response.json();
                console.log('Delete response:', result);
                if (result.success) {
                    alert('Photo deleted successfully!');
                    await loadPhotos();
                    filterPhotos(document.querySelector('.btn-filter.active').dataset.filter);
                } else {
                    alert('Error: ' + result.message);
                    console.error('Delete error:', result.message);
                }
            } catch (error) {
                alert('Error deleting photo. Please try again.');
                console.error('Fetch error:', error);
            }
        }
        async function handleVote(photoId, retract = false) {
            const currentVote = localStorage.getItem('votedPhotoId');
            const action = retract ? 'retract' : 'vote';
            console.log(`${action} for photo:`, photoId);
            try {
                const response = await fetch('vote.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ photoId, retract })
                });
                const result = await response.json();
                console.log('Vote response:', result);
                if (!result.success) {
                    alert('Error: ' + result.message);
                    console.error('Vote error:', result.message);
                    return;
                }
                if (retract) {
                    localStorage.removeItem('votedPhotoId');
                    const card = document.querySelector(`[data-photo-id="${photoId}"]`);
                    card.classList.add('voted');
                    setTimeout(() => card.classList.remove('voted'), 1500);
                } else {
                    if (currentVote && currentVote != photoId) {
                        await fetch('vote.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ photoId: parseInt(currentVote), retract: true })
                        });
                    }
                    localStorage.setItem('votedPhotoId', photoId);
                    const card = document.querySelector(`[data-photo-id="${photoId}"]`);
                    card.classList.add('voted');
                    setTimeout(() => card.classList.remove('voted'), 1500);
                }
                await loadPhotos();
                filterPhotos(document.querySelector('.btn-filter.active').dataset.filter);
            } catch (error) {
                alert('Error processing vote. Please try again.');
                console.error('Vote fetch error:', error);
            }
        }
        function updatePhotoCard(photoId) {
            const card = document.querySelector(`[data-photo-id="${photoId}"]`);
            if (card) {
                const photo = photos.find(p => p.id === photoId);
                card.querySelector('.vote-count').textContent = photo.votes;
                const currentVote = localStorage.getItem('votedPhotoId');
                const voteBtn = card.querySelector('.vote-btn');
                voteBtn.classList.remove('voted');
                voteBtn.innerHTML = `<i class="fas fa-heart text-danger"></i> <span class="vote-count">${photo.votes}</span>`;
                if (currentVote == photoId) {
                    voteBtn.classList.add('voted');
                    voteBtn.innerHTML = `<i class="fas fa-heart-broken text-danger"></i> Retract Vote`;
                    voteBtn.onclick = () => handleVote(photoId, true);
                } else {
                    voteBtn.onclick = () => handleVote(photoId, false);
                }
            }
        }
        function updateLeaderboard() {
            const sorted = [...photos].sort((a, b) => b.votes - a.votes);
            const leaderboard = document.getElementById('leaderboard');
            leaderboard.innerHTML = sorted.slice(0, 10).map((photo, index) => `
                <li class="d-flex justify-content-between align-items-center mb-2 p-2">
                    <div>
                        <span class="badge bg-danger me-2">${index + 1}</span>
                        ${photo.title} by ${photo.photographer}
                    </div>
                    <span class="text-danger">${photo.votes} votes</span>
                </li>
            `).join('');
        }
        function filterPhotos(category) {
            console.log('Filtering photos for category:', category);
            const filtered = category === 'all' ? photos : photos.filter(p => p.category === category);
            console.log('Filtered photos:', filtered.length);
            renderPhotos(filtered);
        }
        function renderPhotos(photosToShow) {
            console.log('Rendering photos:', photosToShow.length);
            const grid = document.getElementById('photoGrid');
            const currentUserId = '<?php echo $currentUserId; ?>';
            const currentVote = localStorage.getItem('votedPhotoId');
            grid.innerHTML = photosToShow.map(photo => {
                console.log(`Photo ID: ${photo.id}, UserID: ${photo.userId || 'undefined'}, Current User: ${currentUserId}, Match: ${photo.userId === currentUserId}`);
                const showButtons = showAllButtons || (photo.userId && photo.userId === currentUserId);
                return `
                <div class="col-md-4 col-lg-3">
                    <div class="photo-card" data-photo-id="${photo.id}">
                        <img src="${photo.image}" class="photo-image" alt="${photo.title}" 
                             onerror="this.src='https://picsum.photos/800/600?random=${photo.id}'">
                        <div class="photo-info">
                            <h5>${photo.title}</h5>
                            <p>By ${photo.photographer}</p>
                            <p>Camera: ${photo.camera}</p>
                        </div>
                        <button class="vote-btn ${currentVote == photo.id ? 'voted' : ''}" 
                                onclick="handleVote(${photo.id}, ${currentVote == photo.id})"
                                data-bs-toggle="tooltip" data-bs-placement="top" 
                                title="${currentVote == photo.id ? 'Retract your vote' : 'Vote for this photo'}">
                            <i class="fas ${currentVote == photo.id ? 'fa-heart-broken' : 'fa-heart'} text-danger"></i>
                            <span class="vote-count">${photo.votes}</span>
                            ${currentVote == photo.id ? ' Retract Vote' : ''}
                        </button>
                        ${showButtons ? `
                            <div class="action-btns">
                                <button onclick="populateEditModal(${photo.id})" class="edit-btn" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this photo">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button onclick="handleDelete(${photo.id})" class="delete-btn" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this photo">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `}).join('');
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                new bootstrap.Tooltip(el);
            });
        }
        document.addEventListener('DOMContentLoaded', () => {
            console.log('Page loaded, initializing...');
            loadPhotos();
            document.querySelectorAll('.btn-filter').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.btn-filter').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    filterPhotos(btn.dataset.filter);
                });
            });
        });
    </script>
    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">SNAPSCAPE<span class="dot">.</span></h4>
                        <p>At SnapScape, we empower photography enthusiasts by combining creativity with cutting-edge technology.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>