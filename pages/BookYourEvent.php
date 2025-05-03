<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Photography Event</title>
    <link rel="stylesheet" href="../css/booking.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Booking Form -->
        <div class="booking-form">
            <h1>Book Your Photography Event</h1>
            <form id="bookingForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="event-type">Event Type</label>
                    <select id="event-type" required>
                        <option value="">Select event type</option>
                        <option value="wedding">Wedding</option>
                        <option value="portrait">Portrait Session</option>
                        <option value="landscape">Landscape Photography</option>
                        <option value="product">Product Photography</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Event Date</label>
                    <input type="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <div class="payment-options">
                        <label>
                            <input type="radio" name="payment" value="bkash" required> bKash
                        </label>
                        <label>
                            <input type="radio" name="payment" value="rocket" required> Rocket
                        </label>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Book Now</button>
            </form>
        </div>

          <!-- Suggested Events -->
          <div class="suggested-events">
            <h2>Suggested Events</h2>
            <div class="event-card">
                <img src="https://source.unsplash.com/300x200/?wedding,photography" alt="Wedding Photography">
                <h3>Wedding Photography</h3>
                <p>Capture your special day with our professional wedding photographers.</p>
            </div>
            <div class="event-card">
                <img src="https://source.unsplash.com/300x200/?portrait,photography" alt="Portrait Session">
                <h3>Portrait Session</h3>
                <p>Get stunning portraits for your personal or professional use.</p>
            </div>
            <div class="event-card">
                <img src="https://source.unsplash.com/300x200/?landscape,photography" alt="Landscape Photography">
                <h3>Landscape Photography</h3>
                <p>Explore breathtaking landscapes with our expert photographers.</p>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal hidden">
        <div class="modal-content">
            <h2>Booking Confirmed!</h2>
            <p>Thank you for booking with us. We'll contact you shortly.</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script src="booking.js"></script>
</body>
</html>