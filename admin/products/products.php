<?php
include_once '../functions.php';

$filename = $_SERVER['DOCUMENT_ROOT'] . '/data/products.txt';

// Retrieve all items
function getAllProducts() {
    global $filename;
    return readData($filename);
}

// Retrieve a specific item
function getProduct($id) {
    $products = getAllProducts();
    return $products[$id] ?? null;
}

// Create a new item
function createProduct($data) {
    global $filename;
    $products = getAllProducts();
    if (!is_array($products)) {
        $products = [];
    }
    $products[] = $data;
    writeData($filename, $products);
    end($products);
    return key($products); // Return the ID of the new item
}

// Update an existing item
function updateProduct($id, $data) {
    global $filename;
    $products = getAllProducts();
    $products[$id] = $data;
    writeData($filename, $products);
}

// Delete an item
function deleteProduct($id) {
    global $filename;
    $products = getAllProducts();
    unset($products[$id]);
    writeData($filename, $products);
}
?>
