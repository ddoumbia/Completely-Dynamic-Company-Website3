<?php
include_once 'products.php';

$id = $_GET['id'];
$product = getProduct($id);

if (!$product) {
    echo "Product not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2><?= htmlspecialchars($product['name']); ?></h2>
        <p><strong>Description:</strong></p>
        <p><?= nl2br(htmlspecialchars($product['description'])); ?></p>
        <p><strong>Price:</strong> $<?= number_format($product['price'], 2); ?></p>
        <a href="edit.php?id=<?= $id; ?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger">Delete</a>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
