<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful - SnapScape</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .success-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-card {
            animation: pulse 1s ease;
        }
        .details-list {
            animation: fadeInUp 1s ease 0.5s forwards;
            opacity: 0;
        }
        @keyframes pulse {
            0% { transform: scale(0.95); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        @keyframes fadeInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="success-page">
    <div class="success-card card shadow p-5 text-center col-md-6 mx-auto">
        <i class='bx bxs-check-circle text-success' style="font-size: 4rem;"></i>
        <h2 class="card-title mt-3">Registration Successful!</h2>
        <p class="text-muted">Thank you for enrolling in our course. We'll contact you soon with further details.</p>
        <!-- <div class="details-list mt-4 text-left">
            <h5 class="card-title">Registration Details</h5>
            <p><strong>Course:</strong> <span id="detailCourse">N/A</span></p>
            <p><strong>Name:</strong> <span id="detailName">N/A</span></p>
            <p><strong>Mobile:</strong> <span id="detailMobile">N/A</span></p>
            <p><strong>Email:</strong> <span id="detailEmail">N/A</span></p>
            <p><strong>Promo Code:</strong> <span id="detailPromo">None</span></p>
            <p><strong>Class Date:</strong> <span id="detailClassDate">N/A</span></p>
            <p><strong>Payment Method:</strong> <span id="detailPaymentMethod">N/A</span></p>
        </div> -->
        <a href="our_courses.php" class="btn btn-brand mt-4">Back to Courses</a>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        // Parse URL query parameters
        const params = new URLSearchParams(window.location.search);
        document.getElementById('detailCourse').textContent = decodeURIComponent(params.get('course') || 'N/A');
        document.getElementById('detailName').textContent = decodeURIComponent(params.get('name') || 'N/A');
        document.getElementById('detailMobile').textContent = decodeURIComponent(params.get('mobile') || 'N/A');
        document.getElementById('detailEmail').textContent = decodeURIComponent(params.get('email') || 'N/A');
        document.getElementById('detailPromo').textContent = decodeURIComponent(params.get('promo') || 'None');
        document.getElementById('detailClassDate').textContent = decodeURIComponent(params.get('class_date') || 'N/A');
        document.getElementById('detailPaymentMethod').textContent = decodeURIComponent(params.get('payment_method') || 'N/A');
    </script>
</body>
</html>