<!doctype html>
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

    <title>SnapScape : DASHBOARD </title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- FIRST NAVBAR -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> Contact@Snapscape.com.bd</p>
                    <p> <i class='bx bxs-phone-call'></i> +8801872801865 </p>
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
                        <a class="nav-link" href="#portfolio"> COURSES </a>
                    </li>
                    
                    
                    
                </ul>

                <!-- <a href="login.php" data-bs-toggle="#" data-bs-target="#"
                    class="btn btn-brand ms-lg-3"> LOG IN </a> -->

                <a href="Ai.php" data-bs-toggle="#" data-bs-target="#"
                    class="btn btn-brand ms-lg-3">AI TOOLS ⚡ </a>
            </div>
        </div>
    </nav>

   

<!-- DASHBOARD -->
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h3>Welcome To SnapScape.</h3>
                        <h6>FEATURES DASHBOARD</h6>
                       
                    </div>
                </div>
            </div>

            <style>
                .service-card {
                    transition: all 0.3s ease;
                    border-radius: 15px;
                    overflow: hidden;
                    background-color: #fff;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                    text-align: center;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }
            
                .service-card img {
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                    transition: transform 0.3s ease;
                }
            
                .service-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
                }
            
                .service-card:hover img {
                    transform: scale(1.05);
                }
            
                .service-card h5 {
                    font-weight: 600;
                    margin-top: 15px;
                }
            
                .service-card p {
                    font-size: 0.95rem;
                    color: #555;
                    padding: 0 15px 20px;
                    flex-grow: 1;
                }
            
                .service-link {
                    color: inherit;
                    text-decoration: none;
                }
            </style>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/portfolio.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/portfolio.png" alt="Portfolio builder">
                            <h5>PORTFOLIO BUILDER</h5>
                            <p>GENERATE YOUR OWN PHOTOGRAPHY PORTFOLIO FROM SNAPSCAPE.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/our_courses.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/our_courses.png" alt="our courses">
                            <h5>OUR COURSES</h5>
                            <p>WE OFFER VIDEOGRAPHY AND PHOTOGRAPHY COURSES & SHARE OUR EXPERIENCE</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/Event_book.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/book_event.png" alt="Book Event">
                            <h5>BOOK YOUR EVENT</h5>
                            <p>COVERING YOUR HAPPIEST EVENT WITH OUR PROFESSIONAL PHOTOGRAPHER</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/photo_contest.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/photo_contest.png" alt="photo contest">
                            <h5>PHOTO CONTEST</h5>
                            <p>JOIN OUR CONTEST , UPLOAD YOUR PHOTO & BECOME A CHAMPION </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/forum.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/forum.png" alt="Our Forum">
                            <h5>SNAPSCAPE FORUM</h5>
                            <p>JOIN OUR FORUM , DISCUSS YOUR IDEA WITH YOUR FRIEND & SHARE YOUR EXPERIENCE</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="../pages/exif.php" class="service-link">
                        <div class="service-card">
                            <img src="../img/exif.png" alt="EXIF">
                            <h5>EXIF PHOTO DETAILS</h5>
                            <p>UPLOAD YOUR PHOTOS & GENERATE YOUR PHOTO DETAILS IN ONE CLICK SOLUTION</p>
                        </div>
                    </a>
                </div>
            </div>
            

<!-- SERVICE END -->

<!-- COURSES START -->
 
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>COURSES</h6>
                        <h1> Our Available Courses </h1>
                        <p class="mx-auto"> SnapScape offers a diverse range of photography courses 
                            tailored for all skill levels from mastering the basics to advanced multiple techniques.
                            </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">
            <div class="project">
                <div class="overlay"></div>
                <img src="../img/project1.jpg" alt="">
                <div class="content">
                    <h2>Basic to Advance Photography</h2>
                    <h6>Duration : 3 Months</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="../img/project2.jpg" alt="">
                <div class="content">
                    <h2>Basic Aerial Videography</h2>
                    <h6>Duration : 2 Months </h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="../img/project3.jpg" alt="">
                <div class="content">
                    <h2>Basic to Advance Video Editing</h2>
                    <h6>Duration : 6 Months</h6>
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
            Distributed By <a
                hrefs="#">FEROZ MAHMUD</a>
        </div>
    </footer>


    




<!-- JAVASCRIPT LINKERS -->



    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>