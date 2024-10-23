<?php
// Function to read data from a text file and return it as an array
function readData($filename) {
    if (!file_exists($filename)) {
        return [];
    }
    $data = file_get_contents($filename);
    if (empty($data)) {
        return []; // Return an empty array if the file is empty
    }
    $decoded = json_decode($data, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Handle JSON decoding errors
        return []; // Return an empty array if JSON is invalid
    }
    return $decoded;
}

// Function to write data to a text file
function writeData($filename, $data) {
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
}
?>
