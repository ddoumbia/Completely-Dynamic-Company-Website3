<?php
include_once '../functions.php';

$filename = $_SERVER['DOCUMENT_ROOT'] . '/data/awards.txt';

// Retrieve all items
function getAllAwards() {
    global $filename;
    return readData($filename);
}

// Retrieve a specific item
function getAward($id) {
    $awards = getAllAwards();
    return $awards[$id] ?? null;
}

// Create a new item
function createAward($data) {
    global $filename;
    $awards = getAllAwards();
    if (!is_array($awards)) {
        $awards = [];
    }
    $awards[] = $data;
    writeData($filename, $awards);
    end($awards);
    return key($awards); // Return the ID of the new item
}

// Update an existing item
function updateAward($id, $data) {
    global $filename;
    $awards = getAllAwards();
    $awards[$id] = $data;
    writeData($filename, $awards);
}

// Delete an item
function deleteAward($id) {
    global $filename;
    $awards = getAllAwards();
    unset($awards[$id]);
    writeData($filename, $awards);
}
?>
