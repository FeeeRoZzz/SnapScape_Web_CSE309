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

// Validate input
$input = json_decode(file_get_contents('php://input'), true);
if (empty($input['photoId'])) {
    echo json_encode(['success' => false, 'message' => 'Photo ID required']);
    exit;
}

// Load existing photos
$photos = json_decode(file_get_contents($jsonFile), true);
if (!is_array($photos)) {
    echo json_encode(['success' => false, 'message' => 'Invalid photos data']);
    exit;
}

// Find photo
$photoId = (int)$input['photoId'];
$photoIndex = array_search($photoId, array_column($photos, 'id'));
if ($photoIndex === false) {
    echo json_encode(['success' => false, 'message' => 'Photo not found']);
    exit;
}

// Update votes
$retract = !empty($input['retract']);
if ($retract) {
    if ($photos[$photoIndex]['votes'] > 0) {
        $photos[$photoIndex]['votes']--;
    } else {
        echo json_encode(['success' => false, 'message' => 'No votes to retract']);
        exit;
    }
} else {
    $photos[$photoIndex]['votes']++;
}

// Save updated photos
if (!file_put_contents($jsonFile, json_encode($photos, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => false, 'message' => 'Failed to save photo metadata']);
    exit;
}

echo json_encode(['success' => true, 'message' => $retract ? 'Vote retracted successfully' : 'Vote cast successfully']);
?>