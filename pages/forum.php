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
    <title>SnapScape : FORUM</title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <?php
    session_start();
    include 'db_connect.php';

    // Check if user is logged in and user_id is set
    if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $username = htmlspecialchars($_SESSION['username']);
    $usertype = htmlspecialchars($_SESSION['usertype']);
    $user_id = (int)$_SESSION['user_id'];

    // Handle logout
    if (isset($_GET['logout'])) {
        session_destroy();
        setcookie('username', '', time() - 3600, "/");
        header("Location: login.php");
        exit();
    }

    // Handle post creation
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_content'])) {
        $content = trim($_POST['post_content']);
        $photo_path = null;

        if (!empty($_FILES['post_photo']['name'])) {
            $target_dir = __DIR__ . "/../Uploads/";
            // Create Uploads directory if it doesn't exist
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $photo_path = "Uploads/" . basename($_FILES['post_photo']['name']);
            $absolute_path = $target_dir . basename($_FILES['post_photo']['name']);
            if (!move_uploaded_file($_FILES['post_photo']['tmp_name'], $absolute_path)) {
                $photo_path = null; // Handle upload failure gracefully
            }
        }

        if (!empty($content) || $photo_path) {
            $stmt = $conn->prepare("INSERT INTO posts (user_id, content, photo_path) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $user_id, $content, $photo_path);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: forum.php");
        exit();
    }

    // Handle like/unlike
    if (isset($_POST['like_post'])) {
        $post_id = (int)$_POST['post_id'];
        $stmt = $conn->prepare("SELECT id FROM likes WHERE user_id = ? AND post_id = ?");
        $stmt->bind_param("ii", $user_id, $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Unlike
            $stmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND post_id = ?");
            $stmt->bind_param("ii", $user_id, $post_id);
            $stmt->execute();
        } else {
            // Like
            $stmt = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $user_id, $post_id);
            $stmt->execute();
        }
        $stmt->close();
        header("Location: forum.php");
        exit();
    }

    // Handle comment
    if (isset($_POST['comment_content'])) {
        $post_id = (int)$_POST['post_id'];
        $content = trim($_POST['comment_content']);
        if (!empty($content)) {
            $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, content) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $user_id, $post_id, $content);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: forum.php");
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
    <section id="forum" class="forum-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <h4><i class='bx bx-camera'></i> Photography Hub</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#">All Posts</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">My Posts</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Popular Shots</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Photo Contests</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="post-creator">
                        <form id="postForm" enctype="multipart/form-data" method="post">
                            <div class="d-flex align-items-start mb-3">
                                <img src="../img/avatar.png" alt="Avatar" class="avatar me-2">
                                <textarea name="post_content" class="form-control" placeholder="Share your photography tips, experiences, or a stunning shot..." rows="3"></textarea>
                            </div>
                            <div id="photoPreview" class="mb-3"></div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label for="post_photo" class="btn btn-outline-primary btn-sm">
                                        <i class='bx bx-image-add'></i> Add Photo
                                        <input type="file" id="post_photo" name="post_photo" accept="image/*" style="display: none;">
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Post</button>
                            </div>
                        </form>
                    </div>
                    <div class="feed">
                        <?php
                        $stmt = $conn->prepare("
                            SELECT p.id, p.user_id, p.content, p.photo_path, p.created_at, u.username, u.usertype,
                                   (SELECT COUNT(*) FROM likes l WHERE l.post_id = p.id) AS like_count,
                                   EXISTS(SELECT 1 FROM likes l WHERE l.post_id = p.id AND l.user_id = ?) AS is_liked
                            FROM posts p
                            JOIN users u ON p.user_id = u.id
                            ORDER BY p.created_at DESC
                        ");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($post = $result->fetch_assoc()) {
                            ?>
                            <div class="post-card">
                                <div class="post-header d-flex align-items-center">
                                    <img src="../img/avatar.png" alt="Avatar" class="avatar me-2">
                                    <div>
                                        <h6 class="mb-0"><?php echo htmlspecialchars($post['username']); ?></h6>
                                        <small class="text-muted"><?php echo ucfirst($post['usertype']); ?> • <?php echo date('M d, Y H:i', strtotime($post['created_at'])); ?></small>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                                    <?php if ($post['photo_path']): ?>
                                        <img src="<?php echo htmlspecialchars($post['photo_path']); ?>" alt="Post Image" class="post-image">
                                    <?php endif; ?>
                                </div>
                                <div class="post-footer">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span><i class='bx bx-heart'></i> <?php echo $post['like_count']; ?> Likes</span>
                                        <span><i class='bx bx-comment'></i> Comments</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                            <button type="submit" name="like_post" class="btn btn-link text-decoration-none">
                                                <i class='bx <?php echo $post['is_liked'] ? 'bxs-heart text-danger' : 'bx-heart'; ?>'></i> <?php echo $post['is_liked'] ? 'Unlike' : 'Like'; ?>
                                            </button>
                                        </form>
                                        <button class="btn btn-link text-decoration-none" onclick="document.getElementById('comment-form-<?php echo $post['id']; ?>').classList.toggle('d-none');">
                                            <i class='bx bx-comment'></i> Comment
                                        </button>
                                    </div>
                                    <div id="comment-form-<?php echo $post['id']; ?>" class="d-none mt-3">
                                        <form method="post">
                                            <div class="input-group">
                                                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                                <input type="text" name="comment_content" class="form-control" placeholder="Write a comment..." required>
                                                <button type="submit" class="btn btn-primary">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="comments mt-3">
                                        <?php
                                        $comment_stmt = $conn->prepare("
                                            SELECT c.content, c.created_at, u.username, u.usertype
                                            FROM comments c
                                            JOIN users u ON c.user_id = u.id
                                            WHERE c.post_id = ?
                                            ORDER BY c.created_at ASC
                                        ");
                                        $comment_stmt->bind_param("i", $post['id']);
                                        $comment_stmt->execute();
                                        $comments = $comment_stmt->get_result();

                                        while ($comment = $comments->fetch_assoc()) {
                                            ?>
                                            <div class="comment d-flex mb-2">
                                                <img src="../img/avatar.png" alt="Avatar" class="avatar small me-2">
                                                <div class="comment-body">
                                                    <strong><?php echo htmlspecialchars($comment['username']); ?></strong>
                                                    <small class="text-muted"><?php echo ucfirst($comment['usertype']); ?> • <?php echo date('M d, Y H:i', strtotime($comment['created_at'])); ?></small>
                                                    <p class="mb-0"><?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $comment_stmt->close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        $stmt->close();
                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="trending">
                        <h4><i class='bx bx-trending-up'></i> Trending Photos</h4>
                        <div class="trending-photo mb-3">
                            <img src="../img/project1.jpg" alt="Trending Photo" class="w-100 rounded">
                            <small class="text-muted">Sunset by @Photoguru</small>
                        </div>
                        <div class="trending-photo mb-3">
                            <img src="../img/project2.jpg" alt="Trending Photo" class="w-100 rounded">
                            <small class="text-muted">Aerial by @DroneMaster</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .forum-section {
            background: #2d3436;
            color: white;
            min-height: 100vh;
            padding: 2rem 0;
        }

        .sidebar {
            background: rgba(255,255,255,0.05);
            border: 1px solid #4a5052;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .sidebar h4 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .sidebar .nav-link {
            color: #ffffff;
            padding: 0.5rem 0;
        }

        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #ff6b35;
        }

        .post-creator {
            background: rgba(255,255,255,0.05);
            border: 1px solid #4a5052;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .post-creator textarea {
            background: #3b4345;
            border: none;
            color: white;
            resize: none;
        }

        .post-creator textarea:focus {
            background: #3b4345;
            color: white;
            box-shadow: none;
            border: 1px solid #ff6b35;
        }

        #photoPreview img {
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid #4a5052;
            margin-top: 1rem;
        }

        .post-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid #4a5052;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar.small {
            width: 30px;
            height: 30px;
        }

        .post-image {
            width: 100%;
            border-radius: 8px;
            margin-top: 1rem;
            transition: transform 0.3s ease;
        }

        .post-image:hover {
            transform: scale(1.02);
        }

        .post-footer hr {
            border-color: #4a5052;
        }

        .post-footer .btn-link {
            color: #ffffff;
        }

        .post-footer .btn-link:hover {
            color: #ff6b35;
        }

        .comments .comment-body {
            background: #3b4345;
            border-radius: 8px;
            padding: 0.75rem;
            flex-grow: 1;
        }

        .trending {
            background: rgba(255,255,255,0.05);
            border: 1px solid #4a5052;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .trending h4 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .trending-photo img {
            transition: transform 0.3s ease;
        }

        .trending-photo img:hover {
            transform: scale(1.05);
        }
    </style>

    <script>
        // Photo preview for post creation
        document.getElementById('post_photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreview').innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('photoPreview').innerHTML = '';
            }
        });

        // Client-side validation for post form
        document.getElementById('postForm').addEventListener('submit', function(e) {
            const content = document.querySelector('textarea[name="post_content"]').value.trim();
            const photo = document.getElementById('post_photo').files[0];
            if (!content && !photo) {
                e.preventDefault();
                alert('Please add some content or a photo to post.');
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