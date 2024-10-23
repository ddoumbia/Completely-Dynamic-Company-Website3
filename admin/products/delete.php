<?php
include_once 'products.php';

$id = $_GET['id'];
$product = getProduct($id);

if (!$product) {
    echo "Product not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteProduct($id);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Product</h2>
        <p>Are you sure you want to delete this product?</p>
        <form method="post">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="detail.php?id=<?= $id; ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
