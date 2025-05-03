<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "snapscape";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("INSERT INTO bookings (event_title, event_date, photographers, videographers, requirements, payment_method, transaction_id, booking_date) VALUES (:event_title, :event_date, :photographers, :videographers, :requirements, :payment_method, :transaction_id, NOW())");
    
    $stmt->bindParam(':event_title', $_POST['event_title']);
    $stmt->bindParam(':event_date', $_POST['event_date']);
    $stmt->bindParam(':photographers', $_POST['photographers']);
    $stmt->bindParam(':videographers', $_POST['videographers']);
    $stmt->bindParam(':requirements', $_POST['requirements']);
    $stmt->bindParam(':payment_method', $_POST['payment_method']);
    $stmt->bindParam(':transaction_id', $_POST['transaction_id']);
    
    $stmt->execute();
    
    echo json_encode(['success' => true]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$conn = null;
?>