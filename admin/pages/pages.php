<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once dirname(__FILE__) . '/../functions.php';

$filename = $_SERVER['DOCUMENT_ROOT'] . '/data/pages.txt';

// Retrieve all items
function getAllPages() {
    global $filename;
    return readData($filename);
}

// Retrieve a specific item
function getPage($id) {
    $pages = getAllPages();
    return $pages[$id] ?? null;
}

// Create a new item
function createPage($data) {
    global $filename;
    $pages = getAllPages();
    if (!is_array($pages)) {
        $pages = [];
    }
    $pages[] = $data;
    writeData($filename, $pages);
    end($pages);
    return key($pages); // Return the ID of the new item
}

// Update an existing item
function updatePage($id, $data) {
    global $filename;
    $pages = getAllPages();
    $pages[$id] = $data;
    writeData($filename, $pages);
}

// Delete an item
function deletePage($id) {
    global $filename;
    $pages = getAllPages();
    unset($pages[$id]);
    writeData($filename, $pages);
}
?>
