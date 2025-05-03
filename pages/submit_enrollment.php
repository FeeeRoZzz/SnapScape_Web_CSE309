<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "snapscape";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$course_name = $_POST['course_name'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$promo = $_POST['promo'];
$payment_method = $_POST['payment_method'];

// Insert data into database
$sql = "INSERT INTO enrollments (course_name, name, mobile, promo_code, payment_method, enrollment_date)
        VALUES ('$course_name', '$name', '$mobile', '$promo', '$payment_method', NOW())";

if ($conn->query($sql) === TRUE) {
    // Redirect to success page
    header("Location: success.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>