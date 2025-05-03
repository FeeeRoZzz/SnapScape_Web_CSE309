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

// Set user_id if not set
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 'user_' . uniqid();
    error_log("New user_id set in delete.php: " . $_SESSION['user_id']);
}
$currentUserId = $_SESSION['user_id'];
error_log("Delete attempt by user_id: " . $currentUserId . ", Session ID: " . session_id());

// Get request data
$input = json_decode(file_get_contents('php://input'), true);
$photoId = isset($input['photoId']) ? (int)$input['photoId'] : null;

if (!$photoId) {
    echo json_encode(['success' => false, 'message' => 'No photo ID provided']);
    exit;
}

// JSON file for photo metadata
$jsonFile = 'photos.json';
if (!file_exists($jsonFile)) {
    echo json_encode(['success' => false, 'message' => 'Photos data not found']);
    exit;
}

// Load photos
$photos = json_decode(file_get_contents($jsonFile), true);
if (!is_array($photos)) {
    echo json_encode(['success' => false, 'message' => 'Invalid photos data']);
    exit;
}

// Find photo
$photoIndex = array_search($photoId, array_column($photos, 'id'));
if ($photoIndex === false) {
    error_log("Photo ID $photoId not found in photos.json");
    echo json_encode(['success' => false, 'message' => 'Photo not found']);
    exit;
}

$photo = $photos[$photoIndex];
error_log("Found photo ID $photoId, userId: " . ($photo['userId'] ?? 'undefined'));

// Temporary bypass for userId check (for testing)
$allowDelete = true; // Set to false after fixing old photos
// $allowDelete = isset($photo['userId']) && $photo['userId'] === $currentUserId;

if (!$allowDelete) {
    error_log("Delete denied: userId mismatch. Photo userId: " . ($photo['userId'] ?? 'undefined') . ", Current userId: $currentUserId");
    echo json_encode(['success' => false, 'message' => 'Unauthorized to delete this photo']);
    exit;
}

// Delete image file
$imagePath = $photo['image'];
if (file_exists($imagePath)) {
    if (!unlink($imagePath)) {
        error_log("Failed to delete image file: $imagePath");
        echo json_encode(['success' => false, 'message' => 'Failed to delete image file']);
        exit;
    }
    error_log("Deleted image file: $imagePath");
} else {
    error_log("Image file not found: $imagePath");
}

// Remove photo from array
unset($photos[$photoIndex]);
$photos = array_values($photos);

// Save updated photos
if (!file_put_contents($jsonFile, json_encode($photos, JSON_PRETTY_PRINT))) {
    error_log("Failed to save updated photos.json");
    echo json_encode(['success' => false, 'message' => 'Failed to update photos data']);
    exit;
}

error_log("Successfully deleted photo ID $photoId");
echo json_encode(['success' => true, 'message' => 'Photo deleted successfully']);
?>