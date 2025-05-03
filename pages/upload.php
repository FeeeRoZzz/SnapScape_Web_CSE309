<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
header('Content-Type: application/json');

// Ensure session is active
if (session_id() === '') {
    session_start();
}

// Set user_id
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 'user_' . uniqid();
    error_log("New user_id set in upload.php: " . $_SESSION['user_id']);
}
$userId = $_SESSION['user_id'];
error_log("Saving photo with user_id: " . $userId . ", Session ID: " . session_id());

// Directory for uploaded images
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
    error_log("Created uploads directory");
}

// JSON file for photo metadata
$jsonFile = 'photos.json';
if (!file_exists($jsonFile)) {
    file_put_contents($jsonFile, json_encode([]));
    error_log("Created new photos.json");
}

// Validate form data
$requiredFields = ['photographerName', 'cameraDetails', 'photoTitle', 'photoCategory'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => "Missing field: $field"]);
        exit;
    }
}

// Validate file upload
if (!isset($_FILES['photoUpload']) || $_FILES['photoUpload']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Photo upload failed']);
    exit;
}

// Validate file type and size
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxSize = 5 * 1024 * 1024; // 5MB
$fileType = $_FILES['photoUpload']['type'];
$fileSize = $_FILES['photoUpload']['size'];

if (!in_array($fileType, $allowedTypes)) {
    echo json_encode(['success' => false, 'message' => 'Only JPEG, PNG, or GIF files allowed']);
    exit;
}
if ($fileSize > $maxSize) {
    echo json_encode(['success' => false, 'message' => 'File size exceeds 5MB']);
    exit;
}

// Generate unique filename
$ext = pathinfo($_FILES['photoUpload']['name'], PATHINFO_EXTENSION);
$filename = uniqid('photo_') . '.' . $ext;
$destination = $uploadDir . $filename;

// Move uploaded file
if (!move_uploaded_file($_FILES['photoUpload']['tmp_name'], $destination)) {
    echo json_encode(['success' => false, 'message' => 'Failed to save photo']);
    exit;
}

// Load existing photos
$photos = json_decode(file_get_contents($jsonFile), true);
if (!is_array($photos)) {
    $photos = [];
    error_log("Reset photos to empty array due to invalid JSON");
}

// Generate new photo ID
$newId = empty($photos) ? 1 : max(array_column($photos, 'id')) + 1;

// Add new photo
$newPhoto = [
    'id' => $newId,
    'title' => $_POST['photoTitle'],
    'photographer' => $_POST['photographerName'],
    'camera' => $_POST['cameraDetails'],
    'votes' => 0,
    'category' => $_POST['photoCategory'],
    'image' => $destination,
    'userId' => $userId
];
$photos[] = $newPhoto;

// Save updated photos
if (!file_put_contents($jsonFile, json_encode($photos, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => false, 'message' => 'Failed to save photo metadata']);
    exit;
}

echo json_encode(['success' => true, 'message' => 'Photo uploaded successfully']);
?>