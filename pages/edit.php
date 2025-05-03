<?php
session_start();
header('Content-Type: application/json');

// Error logging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// JSON file for photo metadata
$jsonFile = 'photos.json';
if (!file_exists($jsonFile)) {
    echo json_encode(['success' => false, 'message' => 'Photos data not found']);
    exit;
}

// Validate form data
$requiredFields = ['photoId', 'photographerName', 'cameraDetails', 'photoTitle', 'photoCategory'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
}

// Load existing photos
$photos = json_decode(file_get_contents($jsonFile), true);
if (!is_array($photos)) {
    echo json_encode(['success' => false, 'message' => 'Invalid photos data']);
    exit;
}

// Find photo
$photoId = (int)$_POST['photoId'];
$photoIndex = array_search($photoId, array_column($photos, 'id'));
if ($photoIndex === false) {
    echo json_encode(['success' => false, 'message' => 'Photo not found']);
    exit;
}

// Verify user ownership
if ($photos[$photoIndex]['userId'] !== ($_SESSION['user_id'] ?? 'unknown')) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized to edit this photo']);
    exit;
}

// Handle file upload (optional)
$newImage = $photos[$photoIndex]['image'];
if (isset($_FILES['photoUpload']) && $_FILES['photoUpload']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB
    $fileType = $_FILES['photoUpload']['type'];
    $fileSize = $_FILES['photoUpload']['size'];

    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Only JPEG, PNG, or GIF files are allowed']);
        exit;
    }
    if ($fileSize > $maxSize) {
        echo json_encode(['success' => false, 'message' => 'File size exceeds 5MB']);
        exit;
    }

    $uploadDir = 'uploads/';
    $ext = pathinfo($_FILES['photoUpload']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('photo_') . '.' . $ext;
    $destination = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['photoUpload']['tmp_name'], $destination)) {
        // Delete old image if it exists
        if (file_exists($newImage)) {
            unlink($newImage);
        }
        $newImage = $destination;
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save new photo']);
        exit;
    }
}

// Update photo data
$photos[$photoIndex] = [
    'id' => $photoId,
    'title' => $_POST['photoTitle'],
    'photographer' => $_POST['photographerName'],
    'camera' => $_POST['cameraDetails'],
    'votes' => $photos[$photoIndex]['votes'],
    'category' => $_POST['photoCategory'],
    'image' => $newImage,
    'userId' => $photos[$photoIndex]['userId']
];

// Save updated photos
if (!file_put_contents($jsonFile, json_encode($photos, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => false, 'message' => 'Failed to save photo metadata']);
    exit;
}

echo json_encode(['success' => true, 'message' => 'Photo updated successfully']);
?>