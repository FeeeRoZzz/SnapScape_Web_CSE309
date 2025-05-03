<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "snapscape";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $course = $_POST['course'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $promo = $_POST['promo'];
    $class_date = $_POST['class_date'];
    $payment_method = $_POST['payment_method'];

    $stmt = $conn->prepare("INSERT INTO registrations (course, name, mobile, email, promo, class_date, payment_method, created_at) 
                            VALUES (:course, :name, :mobile, :email, :promo, :class_date, :payment_method, NOW())");
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':mobile', $mobile);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':promo', $promo);
    $stmt->bindParam(':class_date', $class_date);
    $stmt->bindParam(':payment_method', $payment_method);
    $stmt->execute();

    header("Location: success.php");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>