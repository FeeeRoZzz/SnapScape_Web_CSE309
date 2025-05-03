<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>SnapScape : COURSE</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .course-image {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .course-card:hover .course-image {
            transform: scale(1.1);
        }
        .modal-overlay {
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(5px);
        }
        .modal-content {
            animation: slideIn 0.5s ease forwards;
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .form-container {
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .payment-logo {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .success-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
    </style>
</head>
<body class="bg-gray-100" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- Top Navbar -->
    <div class="top-nav bg-gray-800 text-white py-3">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <p><i class='bx bxs-envelope'></i> Contact@Snapscape.com.bd</p>
                <p><i class='bx bxs-phone-call'></i> +8801872801865</p>
            </div>
            <div class="social-icons flex gap-4">
                <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook text-2xl'></i></a>
                <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram text-2xl'></i></a>
                <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github text-2xl'></i></a>
                <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin text-2xl'></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar bg-white shadow-lg sticky-top py-3">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold" href="../index.php">SNAPSCAPE<span class="text-red-500">.</span></a>
            <div class="flex gap-4">
                <a href="#home" class="hover:text-blue-600">HOME</a>
                <a href="#about" class="hover:text-blue-600">ABOUT</a>
                <a href="#services" class="hover:text-blue-600">SERVICES</a>
                <a href="#courses" class="hover:text-blue-600">COURSES</a>
                <!-- <a href="login.php" class="btn bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">LOG IN</a> -->
                <a href="Ai.php" class="btn bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- Courses Section -->
    <section id="courses" class="py-12">
        <div class="container mx-auto">
            <div class="text-center mb-12 animate__animated animate__fadeIn">
                <h2 class="text-4xl font-bold">Photography & Videography Courses</h2>
                <p class="text-gray-600 mt-2">Master your craft with our professional courses</p>
            </div>

            <!-- Photography Courses -->
            <h3 class="text-2xl font-semibold mb-6 animate__animated animate__fadeInLeft">Photography Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" id="photographyCourses"></div>

            <!-- Videography Courses -->
            <h3 class="text-2xl font-semibold mb-6 animate__animated animate__fadeInRight">Videography Courses</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="videographyCourses"></div>

            <!-- Course Info Popup -->
            <div id="coursePopup" class="fixed inset-0 modal-overlay hidden flex items-center justify-center z-50">
                <div class="modal-content bg-white p-6 rounded-lg shadow-xl max-w-lg w-full">
                    <h3 id="popupTitle" class="text-2xl font-bold mb-4"></h3>
                    <p id="popupDesc" class="text-gray-600 mb-4"></p>
                    <p id="popupPrice" class="text-blue-600 font-semibold mb-4"></p>
                    <p id="popupDuration" class="text-gray-600 mb-4"></p>
                    <p id="popupInstructor" class="text-gray-600 mb-4"></p>
                    <div class="flex justify-end gap-4">
                        <button id="closePopup" class="btn bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Close</button>
                        <button id="proceedToForm" class="btn bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Proceed to Register</button>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
            <div id="registrationForm" class="mt-12 hidden form-container">
                <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h4 class="text-2xl font-bold mb-6">Course Registration</h4>
                    <form id="courseRegistration" action="save_registration.php" method="POST">
                        <div class="mb-4">
                            <label class="block text-gray-700">Selected Course</label>
                            <input type="text" id="selectedCourse" name="course" class="w-full p-2 border rounded" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Full Name</label>
                            <input type="text" name="name" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Mobile No</label>
                            <input type="tel" name="mobile" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Promo Code</label>
                            <input type="text" name="promo" class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Preferred Class Date</label>
                            <input type="date" name="class_date" class="w-full p-2 border rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Payment Method</label>
                            <div class="flex gap-4 flex-wrap">
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="Visa" required>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" class="payment-logo ml-2" alt="Visa">
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="MasterCard">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="payment-logo ml-2" alt="MasterCard">
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="bKash">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/BKash_Logo.svg" class="payment-logo ml-2" alt="bKash">
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="payment_method" value="Nagad">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Nagad_Logo.png" class="payment-logo ml-2" alt="Nagad">
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto text-center">
            <h4 class="text-2xl font-bold">SNAPSCAPE<span class="text-red-500">.</span></h4>
            <p class="mt-4 max-w-2xl mx-auto">At SnapScape, we empower photography enthusiasts by combining creativity with cutting-edge technology. Whether you’re a beginner or a pro, we help you capture, edit, and elevate your photos effortlessly.</p>
            <div class="flex justify-center gap-4 mt-6">
                <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook text-2xl'></i></a>
                <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram text-2xl'></i></a>
                <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github text-2xl'></i></a>
                <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin text-2xl'></i></a>
            </div>
            <p class="mt-6">Copyright By SnapScape Bangladesh (2025). All rights Reserved</p>
            <p>Distributed By <a href="#" class="underline">FEROZ MAHMUD</a></p>
        </div>
    </footer>

    <script>
        const courses = [
            {
                id: 1,
                title: "DSLR Fundamentals",
                category: "Photography",
                price: "৳8,999",
                duration: "4 Weeks",
                desc: "Master manual mode and basic composition",
                image: "https://images.unsplash.com/photo-1610296669228-602fa827fc1f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "John Doe"
            },
            {
                id: 2,
                title: "Portrait Photography",
                category: "Photography",
                price: "৳12,999",
                duration: "6 Weeks",
                desc: "Professional lighting and posing techniques",
                image: "https://images.unsplash.com/photo-1554080353-a576cf803bda?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Jane Smith"
            },
            {
                id: 3,
                title: "Wedding Photography",
                category: "Photography",
                price: "৳15,999",
                duration: "8 Weeks",
                desc: "Full wedding coverage workflow",
                image: "https://images.unsplash.com/photo-1509315811345-672d83ef2fbc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Alice Brown"
            },
            {
                id: 4,
                title: "Landscape Photography",
                category: "Photography",
                price: "৳10,999",
                duration: "4 Weeks",
                desc: "Nature and outdoor shooting techniques",
                image: "https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Bob Wilson"
            },
            {
                id: 5,
                title: "Mobile Photography",
                category: "Photography",
                price: "৳6,999",
                duration: "3 Weeks",
                desc: "Pro smartphone photography skills",
                image: "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Emma Davis"
            },
            {
                id: 6,
                title: "4K Videography",
                category: "Videography",
                price: "৳18,999",
                duration: "8 Weeks",
                desc: "Cinematic video production",
                image: "https://images.unsplash.com/photo-1573152958734-1922c188fba3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Michael Lee"
            },
            {
                id: 7,
                title: "Drone Videography",
                category: "Videography",
                price: "৳21,999",
                duration: "6 Weeks",
                desc: "Aerial shooting and editing",
                image: "https://images.unsplash.com/photo-1579829366248-204fe8413f31?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Sarah Adams"
            },
            {
                id: 8,
                title: "Documentary Filmmaking",
                category: "Videography",
                price: "৳14,999",
                duration: "6 Weeks",
                desc: "Storytelling through video",
                image: "https://images.unsplash.com/photo-1506260408121-e353d10b87c7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "David Clark"
            },
            {
                id: 9,
                title: "Video Editing Masterclass",
                category: "Videography",
                price: "৳16,999",
                duration: "5 Weeks",
                desc: "Premiere Pro & DaVinci Resolve",
                image: "https://images.unsplash.com/photo-1589254065878-42c9da997008?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Laura Evans"
            },
            {
                id: 10,
                title: "Social Media Content Creation",
                category: "Both",
                price: "৳9,999",
                duration: "4 Weeks",
                desc: "Engaging visual content production",
                image: "https://images.unsplash.com/photo-1611162618071-b39a2ec055fb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
                instructor: "Chris Taylor"
            }
        ];

        // Generate Course Cards
        const photographyContainer = document.getElementById('photographyCourses');
        const videographyContainer = document.getElementById('videographyCourses');

        courses.forEach(course => {
            const container = course.category === 'Photography' || course.category === 'Both' ? photographyContainer : videographyContainer;
            if (course.category === 'Both') {
                [photographyContainer, videographyContainer].forEach(cont => {
                    createCourseCard(course, cont);
                });
            } else {
                createCourseCard(course, container);
            }
        });

        function createCourseCard(course, container) {
            const div = document.createElement('div');
            div.className = 'course-card bg-white rounded-lg overflow-hidden shadow-md animate__animated animate__fadeInUp';
            div.innerHTML = `
                <div class="relative">
                    <img src="${course.image}" class="course-image w-full" alt="${course.title}">
                    <span class="absolute top-4 right-4 bg-blue-600 text-white px-2 py-1 rounded">${course.category}</span>
                </div>
                <div class="p-4">
                    <h5 class="text-xl font-semibold">${course.title}</h5>
                    <p class="text-gray-600">${course.desc}</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-blue-600 font-semibold">${course.price}</span>
                        <span class="text-gray-600">${course.duration}</span>
                    </div>
                    <button class="book-btn w-full mt-4 bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition" data-course='${JSON.stringify(course)}'>Book Now</button>
                </div>
            `;
            container.appendChild(div);
        }

        // Handle Book Now Click
        document.querySelectorAll('.book-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const course = JSON.parse(btn.dataset.course);
                showCoursePopup(course);
            });
        });

        // Show Course Popup
        function showCoursePopup(course) {
            document.getElementById('popupTitle').textContent = course.title;
            document.getElementById('popupDesc').textContent = course.desc;
            document.getElementById('popupPrice').textContent = `Price: ${course.price}`;
            document.getElementById('popupDuration').textContent = `Duration: ${course.duration}`;
            document.getElementById('popupInstructor').textContent = `Instructor: ${course.instructor}`;
            document.getElementById('coursePopup').classList.remove('hidden');
            document.getElementById('proceedToForm').onclick = () => showRegistration(course.title);
            document.getElementById('closePopup').onclick = () => document.getElementById('coursePopup').classList.add('hidden');
        }

        // Show Registration Form
        function showRegistration(courseTitle) {
            document.getElementById('coursePopup').classList.add('hidden');
            document.getElementById('registrationForm').classList.remove('hidden');
            document.getElementById('selectedCourse').value = courseTitle;
            window.scrollTo({
                top: document.getElementById('registrationForm').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>