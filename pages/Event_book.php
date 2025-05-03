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
    <title>SnapScape : BOOK EVENT </title>
    <style>
        .event-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .event-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        .event-image {
            height: 350px;
            object-fit: cover;
            filter: grayscale(20%);
            transition: all 0.4s ease;
        }
        .event-card:hover .event-image {
            filter: grayscale(0%);
        }
        .event-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .price-bubble {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: #0984e3;
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(9, 132, 227, 0.3);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .event-duration {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: #fff;
            border-radius: 15px;
            padding: 40px 30px;
            max-width: 800px;
            width: 90%;
            text-align: left;
            position: relative;
            animation: slideIn 0.5s ease;
        }
        @keyframes slideIn {
            from { transform: translateY(-100px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .popup-content img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 25px;
        }
        .popup-content h3 {
            color: #2d3436;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        .popup-content p {
            color: #636e72;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .popup-content ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-bottom: 25px;
        }
        .popup-content ul li {
            color: #636e72;
            margin-bottom: 12px;
        }
        .popup-content .btn {
            padding: 12px 40px;
            font-size: 1.1rem;
            margin-top: 25px;
            display: inline-block;
        }
        .success-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            z-index: 1001;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .success-overlay .checkmark {
            font-size: 80px;
            color: #fff;
            animation: bounce 1s ease;
            margin-bottom: 20px;
        }
        .success-overlay h2 {
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .success-overlay p {
            color: #fff;
            font-size: 1.2rem;
            text-align: center;
            max-width: 600px;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }
        .payment-option {
            display: flex;
            align-items: center;
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .payment-option:hover {
            background: #f1f1f1;
            border-color: #0984e3;
        }
        .payment-option input {
            margin-right: 15px;
        }
        .payment-option img {
            width: 40px;
            height: auto;
            margin-right: 15px;
        }
        .payment-option label {
            font-size: 1.1rem;
            color: #2d3436;
        }
        .payment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
    </style>
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
                <!-- <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a> -->
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>
    <section id="events" class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-10 mx-auto text-center">
                    <h2 class="display-5 mb-3 fw-bold" style="color: #2d3436;">Capture Your Special Moments</h2>
                    <p class="lead text-muted">Professional Event Coverage with Cinematic Flair</p>
                </div>
            </div>
            <div class="row g-4" id="eventContainer"></div>
            <div class="row mt-5" id="bookingForm" style="display: none;">
                <div class="col-lg-8 mx-auto">
                    <div class="glass-card p-4">
                        <h3 class="text-center mb-4" style="color: #2d3436;">Event Booking Details</h3>
                        <form id="eventBooking" action="save_booking.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Selected Event</label>
                                    <input type="text" name="event_title" id="selectedEvent" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Event Date</label>
                                    <input type="date" name="event_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Photographers Needed</label>
                                    <input type="number" name="photographers" min="1" max="5" class="form-control" value="1" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Videographers Needed</label>
                                    <input type="number" name="videographers" min="0" max="3" class="form-control" value="0" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Requirements</label>
                                <textarea name="requirements" class="form-control" rows="4" placeholder="Tell us about your event needs, preferred styles, and any special requests"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <div class="payment-grid">
                                    <div class="payment-option">
                                        <input type="radio" name="payment_method" value="Visa" id="visa" required>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa">
                                        <label for="visa">Visa</label>
                                    </div>
                                    <div class="payment-option">
                                        <input type="radio" name="payment_method" value="MasterCard" id="mastercard" required>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard_2019_logo.svg" alt="MasterCard">
                                        <label for="mastercard">MasterCard</label>
                                    </div>
                                    <div class="payment-option">
                                        <input type="radio" name="payment_method" value="bKash" id="bkash" required>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/BKash_Logo.svg" alt="bKash">
                                        <label for="bkash">bKash</label>
                                    </div>
                                    <div class="payment-option">
                                        <input type="radio" name="payment_method" value="Nagad" id="nagad" required>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Nagad_Logo.svg" alt="Nagad">
                                        <label for="nagad">Nagad</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transaction ID</label>
                                <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-brand px-5">Confirm Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <img id="popupImage" src="" alt="Event">
            <h3 id="popupTitle"></h3>
            <p id="popupDesc"></p>
            <ul id="popupInclusions"></ul>
            <p><strong>Price:</strong> <span id="popupPrice"></span></p>
            <p><strong>Duration:</strong> <span id="popupDuration"></span></p>
            <p>Our team at SnapScape ensures a seamless experience with professional-grade equipment and creative expertise. Book now to secure your event coverage!</p>
            <button class="btn btn-brand" onclick="proceedToForm()">Book This Event</button>
        </div>
    </div>
    <div class="success-overlay" id="successOverlay">
        <i class='bx bxs-check-circle checkmark'></i>
        <h2>Booking Confirmed!</h2>
        <p>Your event has been successfully booked with SnapScape. Your booking reference is <strong id="refNumber"></strong>. You'll receive a confirmation email with all details shortly. Thank you for choosing us!</p>
    </div>
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
            <p class="mb-0">Copyright By SnapScape Bangladesh (2025). All Rights Reserved</p> 
            Distributed By <a href="#">FEROZ MAHMUD</a>
        </div>
    </footer>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/app.js"></script>
    <script>
        const events = [
            {
                title: "Corporate Summit",
                price: "৳75,999",
                desc: "Multi-camera setup for conferences and executive interviews",
                image: "https://images.unsplash.com/photo-1521737604893-d14cc237f11d",
                duration: "1 Day",
                tag: "Business",
                inclusions: ["4K video recording", "Professional lighting setup", "Edited highlight reel", "On-site photo booth"]
            },
            {
                title: "Graduation Ceremony",
                price: "৳45,999",
                desc: "Professional coverage with instant social media highlights",
                image: "https://images.unsplash.com/photo-1591035897819-f4bdf739f446",
                duration: "6 Hours",
                tag: "Academic",
                inclusions: ["Candid photography", "Group portraits", "Social media teasers", "Digital album"]
            },
            {
                title: "Baby Shower",
                price: "৳35,999",
                desc: "Candid moments coverage with our team and you themed photo booth",
                image: "https://images.unsplash.com/photo-1600880292203-757bb62b4baf",
                duration: "4 Hours",
                tag: "Family",
                inclusions: ["Themed decorations", "Candid shots", "Photo booth prints", "Online gallery"]
            },
            {
                title: "Music Festival",
                price: "৳1,75,999",
                desc: "Multi-stage coverage with live streaming setup",
                image: "https://images.unsplash.com/photo-1506157786151-b8491531f063",
                duration: "2 Days",
                tag: "Premium",
                inclusions: ["Live streaming", "Drone footage", "Multi-camera setup", "Post-event video"]
            },
            {
                title: "Product Launch",
                price: "৳85,999",
                desc: "360° product photography & promotional video",
                image: "https://images.unsplash.com/photo-1462826303086-329426d1aef5",
                duration: "8 Hours",
                tag: "Commercial",
                inclusions: ["360° product shots", "Promotional video", "Studio lighting", "Edited photos"]
            },
            {
                title: "Charity Gala",
                price: "৳65,999",
                desc: "Red carpet coverage with donor interaction videos",
                image: "https://images.unsplash.com/photo-1542037104857-ffbb0b9155fb",
                duration: "6 Hours",
                tag: "Non-profit",
                inclusions: ["Red carpet photos", "Interview videos", "Event highlights", "Social media content"]
            }
        ];
        const eventContainer = document.getElementById('eventContainer');
        events.forEach(event => {
            const col = document.createElement('div');
            col.className = 'col-md-6 col-lg-4 mb-4';
            const card = document.createElement('div');
            card.className = 'event-card h-100';
            card.innerHTML = `
                <div class="position-relative">
                    <img src="${event.image}" class="event-image w-100" alt="${event.title}">
                    ${event.tag ? `<div class="event-tag">${event.tag}</div>` : ''}
                    <div class="price-bubble">${event.price}</div>
                    <div class="event-duration">${event.duration}</div>
                </div>
                <div class="p-4">
                    <h5 class="mb-3" style="color: #2d3436;">${event.title}</h5>
                    <p class="text-muted mb-0">${event.desc}</p>
                </div>
                <div class="px-4 pb-4">
                    <button class="btn btn-brand w-100 book-event-btn">
                        <i class='bx bxs-calendar-check me-2'></i>Book Now
                    </button>
                </div>
            `;
            const bookBtn = card.querySelector('.book-event-btn');
            bookBtn.addEventListener('click', (e) => {
                e.preventDefault();
                showPopup(event);
            });
            col.appendChild(card);
            eventContainer.appendChild(col);
        });
        function showPopup(event) {
            try {
                const popupOverlay = document.getElementById('popupOverlay');
                document.getElementById('popupImage').src = event.image;
                document.getElementById('popupTitle').textContent = event.title;
                document.getElementById('popupDesc').textContent = event.desc;
                const inclusionsList = document.getElementById('popupInclusions');
                inclusionsList.innerHTML = event.inclusions.map(item => `<li>${item}</li>`).join('');
                document.getElementById('popupPrice').textContent = event.price;
                document.getElementById('popupDuration').textContent = event.duration;
                popupOverlay.style.display = 'flex';
                window.currentEventTitle = event.title;
            } catch (error) {
                console.error('Error in showPopup:', error);
                alert('Error opening popup. Please try again.');
            }
        }
        function proceedToForm() {
            try {
                const popupOverlay = document.getElementById('popupOverlay');
                popupOverlay.style.display = 'none';
                showBookingForm(window.currentEventTitle);
            } catch (error) {
                console.error('Error in proceedToForm:', error);
                alert('Error proceeding to form. Please try again.');
            }
        }
        function showBookingForm(eventTitle) {
            try {
                const bookingForm = document.getElementById('bookingForm');
                const selectedEvent = document.getElementById('selectedEvent');
                bookingForm.style.display = 'block';
                selectedEvent.value = eventTitle;
                window.scrollTo({
                    top: bookingForm.offsetTop - 100,
                    behavior: 'smooth'
                });
            } catch (error) {
                console.error('Error in showBookingForm:', error);
                alert('Error showing booking form. Please try again.');
            }
        }
        document.getElementById('eventBooking').addEventListener('submit', function(e) {
            e.preventDefault();
            try {
                const formData = new FormData(this);
                fetch('save_booking.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const successOverlay = document.getElementById('successOverlay');
                        const refNumber = Math.random().toString(36).substr(2, 8).toUpperCase();
                        document.getElementById('refNumber').textContent = refNumber;
                        successOverlay.style.display = 'flex';
                        setTimeout(() => {
                            successOverlay.style.display = 'none';
                            document.getElementById('eventBooking').reset();
                            document.getElementById('bookingForm').style.display = 'none';
                        }, 5000);
                    } else {
                        alert('Error saving booking: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error in form submission:', error);
                    alert('Error: ' + error.message);
                });
            } catch (error) {
                console.error('Error in form submission:', error);
                alert('Error submitting form. Please try again.');
            }
        });
    </script>
</body>
</html>